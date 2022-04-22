<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">
        Edit Permission
    </h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
{{-- @dd($permission) --}}
<div class="modal-body">
    <form action="{{ url('admin/permission/'. $permission->id) }}" method="post" id="editor-permission-form">
        @method('PATCH')
        @csrf
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" id="name" class="form-control" name="name" value="{{ old('name', $permission->name) }}" placeholder="Enter name">
                <span class="text-danger error-text name_error"></span>
            </div>
            <div class="form-group">
                <button type="submit" id="submit" class="btn btn-block btn-success">
                    <span class="submit" role="status" aria-hidden="true"></span> Save Changes
                </button>
            </div>
    </form>
</div>
<script>
    $(function() {
        // Proses Edit >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
        $('#editor-permission-form').on('submit', function (event) {
            event.preventDefault();
            let form = this;
            loading();
            $.ajax({
                url: $(form).attr('action'),
                method: $(form).attr('method'),
                data: new FormData(form),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function() {
                    $(form).find('span.error-text').text('');
                },
                success: function(data) {
                    if(data.code == 0) {
                        $.each(data.error, function(prefix, val) {
                            $(form).find('span.'+prefix+'_error').text(val[0]);
                        });
                        removeLoading();
                    } else {
                        $('.modalPermission').modal('hide');
                        $('.modalPermission').find('form')[0].reset();
                        toastr.success(data.msg);
                        submitted = true;
                    }
                }
            })
        });

        function loading() {
            $('input').prop('readonly', true);
            $('#submit').prop('disabled', true);
            $('.submit').addClass('spinner-border spinner-border-sm');
        }

        function removeLoading() {
            $('input').prop('readonly', false);
            $('#submit').prop('disabled', false);
            $('.submit').removeClass('spinner-border spinner-border-sm');
        }
    });
</script>
