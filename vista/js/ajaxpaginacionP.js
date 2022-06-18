
        function paginacion(page) {
            $.ajax({
                type: "POST",
                url: "ajax/postulacionesAjax.php",
                data: "pagina=" + page,
                beforeSend: function() {
                    $("#page-blog").html(`
                    <div class="text-center">
                        <img src="vista/images/Spin-1s-200px.svg">
                    </div>
                    `);
                },
                success: function(response) {
                    $("#page-blog").html(response);
                }
            });
        }
        paginacion();

        $(document).on("click", ".page-link", function() {
            var page = $(this).attr("page");
            paginacion(page);
        });