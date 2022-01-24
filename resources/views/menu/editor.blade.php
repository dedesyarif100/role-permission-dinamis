<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">
        {{ empty($menu) ? 'Create Menu' : 'Edit Menu' }}
    </h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    @if ( empty($menu) )
        <form action="{{ route('menu.store') }}" method="post" id="editor-menu-form">
    @else
        <form action="{{ url('menu/'.$menu->id) }}" method="post" id="editor-menu-form">
        @method('PATCH')
    @endif
        @csrf
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter name" @if ( !empty($menu) ) value="{{ $menu->name }}" @endif>
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
        $('#editor-menu-form').on('submit', function(event) {
            event.preventDefault();
            let form = this;
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
                    } else {
                        $('.modalMenu').modal('hide');
                        $('.modalMenu').find('form')[0].reset();
                        toastr.success(data.msg);
                        submitted = true;
                        cell = table.cell( this );
                        cell.data( cell.data() + 1 ).draw();
                    }
                }
            });
        });
    });
</script>
