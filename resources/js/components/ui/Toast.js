// resources/js/components/ui/Toast.js
import Swal from "sweetalert2";

export function displayToast(message, type = "success") {
    Swal.fire({
        toast: true,
        position: "top-end",
        icon: type,
        title: message,
        showConfirmButton: false,
        timer: 3000,
    });
}

