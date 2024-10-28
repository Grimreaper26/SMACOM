
<div class="modal fade" id="newsModal" tabindex="-1" aria-labelledby="newsModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="newsModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p id="newsDescription">Modal description</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                $('#newsModal').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget);
                    var title = button.data('title');
                    var description = button.data('description');
                    var modal = $(this);
                    modal.find('.modal-title').text(title);
                    modal.find('#newsDescription').text(description);
                });
            </script>