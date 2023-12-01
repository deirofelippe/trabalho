document.addEventListener("DOMContentLoaded", function() {
    const changePasswordForm = document.getElementById("changePasswordForm");
    const changeStatus = document.getElementById("changeStatus");

    changePasswordForm.addEventListener("submit", function(event) {
        event.preventDefault();

        const password = document.getElementById("password").value;
        const confirmPassword = document.getElementById("confirmPassword").value;

        if (password !== confirmPassword) {
            changeStatus.textContent = "As senhas não coincidem.";
            changeStatus.style.color = "red";
        } else {
            // Simulando a alteração da senha (substituindo por sua lógica de backend real)
            // Apenas exibimos uma mensagem de sucesso.
            setTimeout(function() {
                changeStatus.textContent = "Senha alterada com sucesso!";
                changeStatus.style.color = "green";
            }, 1000);
        }
    });
});