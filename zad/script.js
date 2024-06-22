$(document).ready(function() {
    $(".fav-icon").on("click", function() {
        const icon = $(this);
        const idLowiska = icon.data("lowisko");
        
        console.log("Ikona kliknięta, idLowiska:", idLowiska);

        $.ajax({
            type: "POST",
            url: "changeFav.php",
            data: { idLowiska: idLowiska },
            success: function(data) {
                console.log("Odpowiedź z serwera:", data);
                if (data.trim() === "Dodano do ulubionych") {
                    icon.attr("src", "pelne.png");
                    icon.attr("alt", "Usuń z ulubionych");
                } else if (data.trim() === "Usunięto z ulubionych") {
                    icon.attr("src", "puste.png");
                    icon.attr("alt", "Dodaj do ulubionych");
                } else {
                    console.log("Nieoczekiwana odpowiedź:", data);
                }
            },
            error: function(xhr, status, error) {
                console.error("Błąd AJAX:", status, error);
            }
        });
    });
});
