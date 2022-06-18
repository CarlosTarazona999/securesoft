
        function paginacionEmpleos(page) {
            $.ajax({
                type: "POST",
                url: "ajax/PublicacionesEmpleosAjax.php",
                data: "pagina=" + page,
                beforeSend: function() {
                    $("#Lista_empleos").html(`
                    <div class="text-center">
                        <img src="vista/images/Spin-1s-200px.svg">
                    </div>
                    `);
                },
                success: function(response) {
                    $("#Lista_empleos").html(response);
                    
                }
            });
        }
        paginacionEmpleos();

        $(document).on("click", ".page-link-empleos", function() {
            var page = $(this).attr("page");
            paginacionEmpleos(page);
        });

        