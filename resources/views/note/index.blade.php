<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include("layout.header")
    <body style="margin:100px;">
        
        <div>
            <h3 style="font-size: 28px;">
                Note
                <a href="{{ route('note.add') }}" class="btn btn-primary float-right">Add Note</a>
            </h3>
        </div>
        <hr>
        <div>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Tanggal Terbuat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($notes as $note)
                        <tr>
                            <td>{{ $note->title }}</td>
                            <td>{{ $note->description }}</td>
                            <td>{{ $note->created_at->format('d M Y H:i') }}</td>

                            <td class="text-center gap-3">
                                <a href="{{ route('note.edit', $note->id) }}"><button type="button" class="btn btn-success">Edit</button><a>
                                <button type="button" class="btn btn-danger btn-delete-list" data-id="{{ $note->id }}" data-name="note">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        </body>
</html>

<script>
    
</script>
