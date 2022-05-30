"use strict";

// Class definition
var KTUsersViewMain = function () {

    // Init login session button
    var initLoginSession = () => {
        const button = document.getElementById('kt_modal_sign_out_sesions');

        button.addEventListener('click', e => {
            e.preventDefault();

            Swal.fire({
                text: "Tem certeza de que quer efetuar logout em todas as sessões?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Sim",
                cancelButtonText: "Não",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light"
                }
            }).then(function (result) {
                if (result.value) {
                    Swal.fire({
                        text: "Você saiu de todas as sessões.",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Continuar",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        }
                    });
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "Sessões mantidas.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Continuar",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        }
                    });
                }
            });
        });
    }


    // Init sign out single user
    var initSignOutUser = () => {
        const signOutButtons = document.querySelectorAll('[data-kt-users-sign-out="single_user"]');

        signOutButtons.forEach(button => {
            button.addEventListener('click', e => {
                e.preventDefault();

                const deviceName = button.closest('tr').querySelectorAll('td')[1].innerText;

                Swal.fire({
                    text: "Tem certeza de que quer efetuar logout em " + deviceName + "?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Sim",
                    cancelButtonText: "Não",
                    customClass: {
                        confirmButton: "btn btn-primary",
                        cancelButton: "btn btn-active-light"
                    }
                }).then(function (result) {
                    if (result.value) {
                        Swal.fire({
                            text: "Você efetuou logout em " + deviceName + "!.",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Continuar",
                            customClass: {
                                confirmButton: "btn btn-primary",
                            }
                        }).then(function(){
                            button.closest('tr').remove();
                        });
                    } else if (result.dismiss === 'cancel') {
                        Swal.fire({
                            text: deviceName + "teve sessão mantida!.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Continuar",
                            customClass: {
                                confirmButton: "btn btn-primary",
                            }
                        });
                    }
                });
            });
        });


    }

    // Delete two step authentication handler
    const initDeleteTwoStep = () => {
        const deleteButton = document.getElementById('kt_users_delete_two_step');

        deleteButton.addEventListener('click', e => {
            e.preventDefault();

            Swal.fire({
                text: "Tem certeza de que deseja desativar a Autenticação em duas etapas?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Sim",
                cancelButtonText: "Não",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light"
                }
            }).then(function (result) {
                if (result.value) {
                    Swal.fire({
                        text: "Você desativou a Autenticação em duas etapas.",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Continuar",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        }
                    });
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "Autenticação em duas etapas mantida.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Continuar",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        }
                    });
                }
            });
        })
    }

    // Email preference form handler
    const initEmailPreferenceForm = () => {
        // Define variables
        const form = document.getElementById('kt_users_email_notification_form');
        const submitButton = form.querySelector('#kt_users_email_notification_submit');
        const cancelButton = form.querySelector('#kt_users_email_notification_cancel');

        // Submit action handler
        submitButton.addEventListener('click', e => {
            e.preventDefault();

            // Show loading indication
            submitButton.setAttribute('data-kt-indicator', 'on');

            // Disable button to avoid multiple click 
            submitButton.disabled = true;

            // Simulate form submission. For more info check the plugin's official documentation: https://sweetalert2.github.io/
            setTimeout(function () {
                // Remove loading indication
                submitButton.removeAttribute('data-kt-indicator');

                // Enable button
                submitButton.disabled = false;

                // Show popup confirmation 
                Swal.fire({
                    text: "Formulário enviado com sucesso!",
                    icon: "success",
                    buttonsStyling: false,
                    confirmButtonText: "Continuar",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                });

                //form.submit(); // Submit form
            }, 2000);
        });

        cancelButton.addEventListener('click', e => {
            e.preventDefault();

            Swal.fire({
                text: "Tem certeza de que quer cancelar?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Sim",
                cancelButtonText: "Não",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light"
                }
            }).then(function (result) {
                if (result.value) {
                    form.reset(); // Reset form				
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "Seu formulário não foi cancelado.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Continuar",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        }
                    });
                }
            });
        });
    }


    return {
        // Public functions
        init: function () {
            initLoginSession();
            initSignOutUser();
            initDeleteTwoStep();
            initEmailPreferenceForm();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTUsersViewMain.init();
});