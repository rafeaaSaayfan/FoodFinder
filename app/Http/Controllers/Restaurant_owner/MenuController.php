<?php

namespace App\Http\Controllers\Restaurant_owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditRequest;
use App\Models\Menu_items;
use App\Models\Orders;
use Illuminate\Http\Request;
use App\Http\Requests\Restaurant_owner\MenuRequest;
use App\Models\Attributes;
use App\Models\Cart;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function getMenu(Request $request) {
        $restaurant_id = $request->restaurant_id;
        $category = $request->category;
        $search = $request->search;

        if (empty($search) && empty($category)) {
            $menu = Menu::where('restaurant_id', $restaurant_id);
        } else if (empty($search)) {
            $menu = Menu::where('restaurant_id', $restaurant_id)
            ->where('category', $category);
        } else if (empty($category)) {
            $menu = Menu::where('restaurant_id', $restaurant_id)
            ->where('name', 'like', '%' . $search . '%');
        } else {
            $menu = Menu::where('restaurant_id', $restaurant_id)
            ->where('category', $category)
            ->where('name', 'like', '%' . $search . '%');
        }

        $menus = $menu->paginate(6);

        return response()->json([
            'success' => true,
            'data' => $menus->items(),
            'pagination' => (string) $menus->links(),
        ]);
    }


    public function createMenu(MenuRequest $request) {
        $image = $this->storeImage($request->file('image'));

        Menu::create([
            'restaurant_id' => $request->restaurant_id,
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
            'price' => $request->price,
            'category' => $request->category,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'added successfully',
        ]);
    }

    public function deleteMenu(Request $request) {
        $query = Menu::findOrFail($request->id);

        $query->delete();

        return response()->json([
            'success' => true,
            'message' => 'Deleted successfully',
        ]);
    }

    private function storeImage($file)
    {
        $extension = $file->getClientOriginalExtension();
        $filename = time() . rand(1, 10000) . "." . $extension;
        $file->move(public_path('uploads/menu_images'), $filename);

        return $filename;
    }


// public function item_detail(Request $request) {
//     $itemId = $request->input('item_id');


//     $menuItem = Menu_items::findOrFail($itemId);

//     $attributes = $menuItem->attributes;

//     return view('item_detail', [
//         'menuItem' => $menuItem,
//         'attributes' => $attributes,
//     ]);
// }

public function buy(Request $request, $menuId){

    $data = $request->validate([
        'quantity' => 'required|integer|min:1',
        'attributes' => 'array',
        'attributes.*' => 'exists:attributes,id',
    ],

    [
    'required'=>'The :attribute field is required.',
    'quantity.min'=>'Min quantity is 1'
    ]);

    $user_id = auth()->user()->id;
    $menu_item = Menu_items::findOrFail($menuId);
    $selected_attributes = $request->input('attributes', []);
    $quantity = $request->input('quantity', 1);

    $item_price = $menu_item->price;
    $attribute_prices = Attributes::whereIn('id', $selected_attributes)->pluck('price');
    $total_attributes_price = $attribute_prices->sum();

    $total_price = ($item_price + $total_attributes_price) * $quantity;

    $cart = Cart::create([
        'user_id' => $user_id,
        'menu_item_id' => $menuId,
        'selected_attributes' => json_encode($selected_attributes),
        'quantity' => $quantity,
        'total_price' => $total_price,
    ]);

    return redirect()->route('menu', ['item_id' => $menuId])->with('success', 'Item added to cart successfully.');
}

public function cart()
{
    if (auth()->check()) {
        $user = auth()->user();

        $cartItems = Cart::where('user_id', $user->id)
            ->where('status', 'pending')
            ->get();

        $subtotal = $cartItems->sum('total_price');

        return view('cart', ['user' => $user, 'cartItems' => $cartItems, 'subtotal' => $subtotal]);

    } else {
        return redirect()->route('/');
    }
}

public function remove_cart(Request $request)
{
    $cartItemId = $request->input('cart_item_id');

    $cartItem = Cart::find($cartItemId);

    if ($cartItem) {
        $cartItem->delete();
        return redirect()->route('cart')->with('success', 'Item removed from cart successfully.');
    } else {
        return redirect()->route('cart')->with('error', 'Item not found in cart.');
    }
}


public function edit_item($item_id)
{
    if (auth()->check()) {
        $user = auth()->user();
        $attributes = Attributes::all();
        $menuItem = Menu_items::findOrFail($item_id);
        return view('edit_menu', ['user' => $user, 'attributes' => $attributes, 'menuItem' =>$menuItem]);
    } else {
        return redirect()->route('/');
    }
}

public function update(EditRequest $request, $itemId)
{
    $data = $request->validated();
    $menuItem = Menu_items::findOrFail($itemId);

    $menuItem->name = $data['name'];
    $menuItem->price = $data['price'];
    $menuItem->category = $data['category'];
    $menuItem->description = $data['description'];

    if ($request->hasFile('image')) {

        if ($menuItem->image) {
            $oldImagePath = public_path('uploads');
            $oldImage = basename($menuItem->image);
            if (file_exists($oldImagePath . '/' . $oldImage)) {
                unlink($oldImagePath . '/' . $oldImage);
            }
        }

        $extension = strtolower($request->file('image')->getClientOriginalExtension());
        $filename = time() . rand(1, 10000) . "." . $extension;
        $request->file('image')->move(public_path('uploads'), $filename);

        $menuItem->image = $filename;
    }

    $menuItem->attributes()->sync($data['attributes']);

    $menuItem->save();

    return redirect()->route('menu', ['item_id' => $menuItem->id])->with('success', 'Item updated successfully.');
}

public function delete_item_menu($id)
{
    $menuItem = Menu_items::findOrFail($id);

    if ($menuItem->image) {
        $imagePath = public_path('uploads') . '/' . $menuItem->image;
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    $menuItem->delete();

    return redirect()->route('menu')->with('success', 'Menu item deleted successfully.');
}



public function checkout()
{
    if (auth()->check()) {
        $user = Auth::user();
        $cartItems = Cart::where('user_id', $user->id)
        ->where('status', 'pending')
        ->get();


        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        $totalPrice = $cartItems->sum('total_price');

        $order = new Orders([
            'user_id' => $user->id,
            'cart_item_ids' => $cartItems->pluck('id'),
            'total_price' => $totalPrice,
        ]);
        $order->save();

        $cartItemIds = $cartItems->pluck('id');
        Cart::whereIn('id', $cartItemIds)->update(['status' => 'ordered']);

        $menuItems = Menu_items::all();
            return view('menu',['user' => $user,  'menuItems' => $menuItems])->with('success','Order Added Successfuly');
    } else {
        return redirect()->route('/');
    }
}

public function orders()
{
    if (auth()->check()) {
        $user = Auth::user();
        $orders = Orders::where('user_id', $user->id)->get();

        return view('orders', ['user' => $user, 'orders' => $orders]);
    } else {
        return redirect()->route('/');
    }
}

public function remove_order($id)
{
    $user = auth()->user();
    $order = Orders::where('user_id', $user->id)
        ->where('id', $id)
        ->first();

    $order->delete();

    return redirect()->back()->with('success', 'Order removed successfully.');
}

public function admin()
{

    $orders = Orders::where('status', 'pending')->get();

    return view('admin', ['orders' => $orders]);
}

public function order_detail($id)
{
    $order = Orders::find($id);
    if (!$order) {
        return redirect()->back()->with('error', 'Order not found.');
    }

    $cartItemIds = json_decode($order->cart_item_ids);

    $orderDetails = [];

    foreach ($cartItemIds as $cartItemId) {
        $cartItem = Cart::find($cartItemId);

        if ($cartItem) {
            $menuItem = Menu_items::find($cartItem->menu_item_id);

            $selectedAttributes = [];
            foreach (json_decode($cartItem->selected_attributes) as $attributeId) {
                $attribute = Attributes::find($attributeId);
                if ($attribute) {
                    $selectedAttributes[] = $attribute->name;
                }
            }

            $orderDetails[] = [
                'menuItem' => $menuItem,
                'totalPrice' => $cartItem->total_price,
                'quantity' => $cartItem->quantity,
                'selectedAttributes' => $selectedAttributes,
            ];
        }
    }

    return view('order_detail', ['orderDetails' => $orderDetails, 'order' => $order]);
}

public function acceptOrder($id)
{
    $order = Orders::find($id);

    if ($order) {
        $order->status = 'Accepted';
        $order->save();
    }

    return redirect()->route('admin')->with('success', 'Order has been accepted.');
}

public function denyOrder($id)
{
    $order = Orders::find($id);

    if ($order) {
        $order->status = 'Denied';
        $order->save();
    }

    return redirect()->route('admin')->with('success', 'Order has been denied.');
}






}





