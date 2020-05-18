<div class="row grid-divider">
    <div class="col-sm-4">
        <div class="col-padding">
            <a class="thumbnail" href="#" data-image-id="" data-toggle="modal"
               data-title="{{$foto->nama_foto}}"
               data-image="../assets/uploads/pertamanan/{{$foto->file_foto}}"
               data-target="#image-gallery{{$loop->iteration}}">
                <img class="img-thumbnail"
                     src="../assets/uploads/pertamanan/{{$foto->file_foto}}"
                     alt="{{$foto->nama_foto}}"
                     style="width: 300px; height: 70px;">
            </a>
        </div>
    </div>
</div>


<div class="modal fade" id="image-gallery{{$loop->iteration}}" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h6 class="modal-title" id="image-gallery-title">{{$foto->nama_foto}}</h6>
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">×</span><span class="sr-only">Close</span>
                </button>
            </div>

            <div class="modal-body text-center">
                <img id="image-gallery-image" class="img-responsive col-sm-12"
                     src="../assets/uploads/pertamanan/{{$foto->file_foto}}"
                     style="width: 500px;height: 400px">
            </div>

            <div class="modal-footer">
<!--                <button type="button" class="btn btn-secondary float-left" id="show-previous-image">-->
<!--                    <i class="fa fa-arrow-left"></i>-->
<!--                </button>-->
<!---->
<!--                <button type="button" id="show-next-image" class="btn btn-secondary float-right">-->
<!--                    <i class="fa fa-arrow-right"></i>-->
<!--                </button>-->
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    let modalId = $('#image-gallery{{$loop->iteration}}');

    $(document)
    .ready(function () {

        loadGallery(true, 'a.thumbnail');

        //This function disables buttons when needed
        function disableButtons(counter_max, counter_current) {
            $('#show-previous-image, #show-next-image')
            .show();
            if (counter_max === counter_current) {
                $('#show-next-image')
                .hide();
            } else if (counter_current === 1) {
                $('#show-previous-image')
                .hide();
            }
        }

        /**
         *
         * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
         * @param setClickAttr  Sets the attribute for the click handler.
         */

        function loadGallery(setIDs, setClickAttr) {
            let current_image,
                selector,
                counter = 0;

            $('#show-next-image, #show-previous-image')
            .click(function () {
                if ($(this)
                .attr('id') === 'show-previous-image') {
                    current_image--;
                } else {
                    current_image++;
                }

                selector = $('[data-image-id="' + current_image + '"]');
                updateGallery(selector);
            });

            function updateGallery(selector) {
                let $sel = selector;
                current_image = $sel.data('image-id');
                $('#image-gallery-title')
                .text($sel.data('title'));
                $('#image-gallery-image')
                .attr('src', $sel.data('image'));
                disableButtons(counter, $sel.data('image-id'));
            }

            if (setIDs == true) {
                $('[data-image-id]')
                .each(function () {
                    counter++;
                    $(this)
                    .attr('data-image-id', counter);
                });
            }
            $(setClickAttr)
            .on('click', function () {
                updateGallery($(this));
            });
        }
    });

    // build key actions
    $(document)
    .keydown(function (e) {
        switch (e.which) {
            case 37: // left
                if ((modalId.data('bs.modal') || {})._isShown && $('#show-previous-image').is(
                    ":visible")) {
                    $('#show-previous-image')
                    .click();
                }
                break;

            case 39: // right
                if ((modalId.data('bs.modal') || {})._isShown && $('#show-next-image').is(
                    ":visible")) {
                    $('#show-next-image')
                    .click();
                }
                break;

            default:
                return; // exit this handler for other keys
        }
        e.preventDefault(); // prevent the default action (scroll / move caret)
    });

</script>
