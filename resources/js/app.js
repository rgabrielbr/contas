import "./bootstrap";
import { Money } from "./helpers/money";

(function () {
    $(".money").on("input", function () {
        const value = this.value.replace(/\D/g, "");
        if (value) {
            this.value = Money.fromInt(value);
        } else {
            this.value = "0,00";
        }
    });

    $(".money").on("blur", function () {
        this.value = Money.fromInt(this.value);
    });

    $("#btnLogout").on("click", function (event) {
        event.preventDefault();
        event.stopPropagation();
        if (window.confirm("Deseja realmente sair?")) {
            $("#formLogout").trigger("submit");
        }
    });

    $(function () {
        $(".money").trigger("blur");
    });
})();
