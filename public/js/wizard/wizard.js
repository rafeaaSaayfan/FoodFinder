import { CompleteProfile } from "../restaurant_owner/complete_profile/complete_profile.js";

export class Wizard {
    static progress_step = parseInt($('.progress_step').val());

    static handleStepProgress = () => {
        const wizardBtn = $(".wizardBtn");
        const prevWizardBtn = $(".prevWizardBtn");

        wizardBtn.on('click', function(e) {
            e.preventDefault();
            CompleteProfile.getData(Wizard.progress_step);
        });

        prevWizardBtn.on('click', function(e) {
            e.preventDefault();
            Wizard.progress_step--;
            Wizard.handleStep();
        });

        Wizard.handleStep();
    }


    static handleStep = () => {
        switch (Wizard.progress_step) {
            case 0:
                $(".step_1").show();
                $(".step_2").hide();
                $(".step_3").hide();
                $(".step_4").hide();

                $(".stepper1").removeClass('opacity-70');
                $(".stepper2").addClass('opacity-70');
                $(".stepper3").addClass('opacity-70');
                $(".stepper4").addClass('opacity-70');

                $(".stepper1 .rounded-full").addClass('bg-ter');
                $(".stepper2 .rounded-full").removeClass('bg-ter');
                $(".stepper3 .rounded-full").removeClass('bg-ter');
                $(".stepper4 .rounded-full").removeClass('bg-ter');

                $(".stepper2 .rounded-full").addClass('bg-pr');
                $(".stepper3 .rounded-full").addClass('bg-pr');
                $(".stepper4 .rounded-full").addClass('bg-pr');

                $(".prevWizardBtn").hide();
                $('.notallowedBtn').hide();
                $(".wizardBtn .submit").hide();
                break;
            case 1:
                $(".step_1").hide();
                $(".step_2").show();
                $(".step_3").hide();
                $(".step_4").hide();

                $(".stepper1").addClass('opacity-70');
                $(".stepper2").removeClass('opacity-70');
                $(".stepper3").addClass('opacity-70');
                $(".stepper4").addClass('opacity-70');

                $(".stepper1 .rounded-full").removeClass('bg-ter');
                $(".stepper1 .rounded-full").addClass('bg-pr');
                $(".stepper2 .rounded-full").addClass('bg-ter');
                $(".stepper2 .rounded-full").removeClass('bg-pr');
                $(".stepper3 .rounded-full").removeClass('bg-ter');
                $(".stepper3 .rounded-full").addClass('bg-pr');
                $(".stepper4 .rounded-full").removeClass('bg-ter');
                $(".stepper4 .rounded-full").addClass('bg-pr');

                $(".prevWizardBtn").show();
                $(".wizardBtn .submit").hide();
                $('.notallowedBtn').hide();
                $(".wizardBtn").show();
                break;
            case 2:
                $(".step_1").hide();
                $(".step_2").hide();
                $(".step_3").show();
                $(".step_4").hide();

                $(".stepper1").addClass('opacity-70');
                $(".stepper2").addClass('opacity-70');
                $(".stepper3").removeClass('opacity-70');
                $(".stepper4").addClass('opacity-70');

                $(".stepper1 .rounded-full").removeClass('bg-ter');
                $(".stepper1 .rounded-full").addClass('bg-pr');
                $(".stepper2 .rounded-full").removeClass('bg-ter');
                $(".stepper2 .rounded-full").addClass('bg-pr');
                $(".stepper3 .rounded-full").addClass('bg-ter');
                $(".stepper3 .rounded-full").removeClass('bg-pr');
                $(".stepper4 .rounded-full").removeClass('bg-ter');
                $(".stepper4 .rounded-full").addClass('bg-pr');

                $(".prevWizardBtn").show();
                $(".wizardBtn .nextStep").show();
                $(".wizardBtn .submit").hide();
                $('.notallowedBtn').hide();
                $(".wizardBtn").show();
                break;
            case 3:
                $(".step_1").hide();
                $(".step_2").hide();
                $(".step_3").hide();
                $(".step_4").show();

                $(".stepper1").addClass('opacity-70');
                $(".stepper2").addClass('opacity-70');
                $(".stepper3").addClass('opacity-70');
                $(".stepper4").removeClass('opacity-70');

                $(".stepper1 .rounded-full").removeClass('bg-ter');
                $(".stepper1 .rounded-full").addClass('bg-pr');
                $(".stepper2 .rounded-full").removeClass('bg-ter');
                $(".stepper2 .rounded-full").addClass('bg-pr');
                $(".stepper3 .rounded-full").removeClass('bg-ter');
                $(".stepper3 .rounded-full").addClass('bg-pr');
                $(".stepper4 .rounded-full").addClass('bg-ter');
                $(".stepper4 .rounded-full").removeClass('bg-pr');

                $(".prevWizardBtn").show();
                $(".wizardBtn .submit").show();
                $(".wizardBtn .nextStep").hide();

                if ($('#confirmCheckbox').prop('checked')) {
                    $('.notallowedBtn').hide();
                    $(".wizardBtn").show();
                } else {
                    $(".wizardBtn").hide();
                    $('.notallowedBtn').show();
                }

                break;
            default:
                console.error("Invalid step");
        }
    }
}


