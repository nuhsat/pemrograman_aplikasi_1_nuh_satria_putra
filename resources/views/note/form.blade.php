<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include("layout.header")
    <body style="margin:100px;">
    <div>
        <h3 class="master-title">
            Add Note
        </h3>
    </div>
    <hr>
    <div>
        <form id="form-add-note">
            <input type="hidden" id="id" value="{{ $note != null ? $note->id : '' }}">
            <div class="row col-md-12 mt-3">
                <label for="title" class="col-md-3 pt-2">Title</label>
                <div class="col-md-6">
                    <input type="text" id="title" class="form-control" name="title" value="{{ $note != null ? $note->title : '' }}" placeholder="Title">
                </div>
            </div>
            
            <div class="row col-md-12 mt-3">
                <label for="subtitle" class="col-md-3 pt-2">Description</label>
                <div class="col-md-6">
                    <textarea id="description" class="form-control" name="description" placeholder="Subtitle" rows="5">{{ $note != null ? $note->description : '' }}</textarea>
                </div>
            </div>

            <div>
                <button id="submit-add-note" type="button" class="btn btn-primary float-right">Submit</button>
            </div>
        </form>
    </div>
    </body>
</html>


<script>
    $("#submit-add-note").click(function() {
        var formData = new FormData();
        formData.append('title', $("#title").val());
        formData.append('description', $("#description").val());

        $.ajax({
            url: "",
            type: "post",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                Swal.fire({
                    icon: "success",
                    title: "Submit Note Berhasil!",
                    showCancelButton: false,
                }).then((result) => {
                    window.location.href = "/note";
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log("jjqXHR", jqXHR);
                console.log(textStatus, errorThrown);
                
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: jqXHR?.responseJSON?.message || "",
                });
            }
        });
    });

</script>
