@extends('layout')
@section('content')

<table class="table" style="margin-left: 50px;">
    <br><br>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    @if(session()->has('messages'))
        <div class="alert alert-danger">
            {{ session()->get('messages') }}
        </div>
    @endif
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tag name</th>

            <th scope="col">action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1 ?>
        @foreach ($tags as $tag)
        <tr>
            <th scope="row"><?php echo $i ?></th>
            <?php $i++ ?>
            <td>{{$tag->name}}</td>

            <td>
                <small style="color: blue;margin-left: 5px;"><button class="btn" and
                    data-toggle="modal" data-target="#editTag{{$tag->id}}"
                        style="background-color:transparent">Edit</button></small>||
                <small style="color: red;margin-left: 5px;"><button class="btn" and
                    data-toggle="modal" data-target="#deleteTag{{$tag->id}}"
                        style="background-color:transparent">Delete</button></small>
            </td>
        </tr>
        {{-- ############################ delete tag   ################################ --}}



 <div class="modal fade" id="deleteTag{{$tag->id}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                   id="exampleModalLabel">Are you sure you want to delete this tag ??

               </h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body">
               <!-- add_form -->
               <form action="{{ route('tag.destroy',$tag->id) }}" method="POST">
                   @csrf
                   @method('delete')

                   <div class="form-group">
                       <label
                           for="exampleFormControlTextarea1">
                           </label>
                       <textarea class="form-control" name="name" id="exampleFormControlTextarea1"
                                 rows="3" placeholder="Add your category">{{$tag->name}}</textarea>
                   </div>
                   <br><br>
           </div>
           <div class="modal-footer">
               <button type="button" class="btn btn-secondary"
                       data-dismiss="modal">close</button>
               <button type="submit"
                       class="btn btn-success">delete</button>
           </div>
           </form>

       </div>
    </div>
   </div>

        {{-- ############################ edit tag   ################################ --}}



 <div class="modal fade" id="editTag{{$tag->id}}" tabindex="-1" role="dialog"
 aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                id="exampleModalLabel">Edit Tag

            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <!-- add_form -->
            <form action="{{ route('tag.update',$tag->id) }}" method="POST">
                @csrf
                @method('put')

                <div class="form-group">
                    <label
                        for="exampleFormControlTextarea1">
                        </label>
                    <textarea class="form-control" name="name" id="exampleFormControlTextarea1"
                              rows="3" placeholder="Add your category">{{$tag->name}}</textarea>
                </div>
                <br><br>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">close</button>
            <button type="submit"
                    class="btn btn-success">update</button>
        </div>
        </form>

    </div>
 </div>
</div>
        @endforeach




    </tbody>
</table>
<button type="button" class="btn btn-primary" data-toggle="modal"
 data-target="#addTag" style="background-color: black;margin-left: 50px;float: right;margin-right: 50px">Add Tag</button>



 <div class="modal fade" id="addTag" tabindex="-1" role="dialog"
 aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                id="exampleModalLabel">Add Tag

            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <!-- add_form -->
            <form action="{{ route('tag.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label
                        for="exampleFormControlTextarea1">
                        </label>
                    <textarea class="form-control" name="name" id="exampleFormControlTextarea1"
                              rows="3" placeholder="Add your category"></textarea>
                </div>
                <br><br>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">close</button>
            <button type="submit"
                    class="btn btn-success">add</button>
        </div>
        </form>

    </div>
 </div>
</div>
{{--
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">New Tag</h4>
        </div>


      <div class="form-group">
        <label for=""></label>
        <textarea class="form-control" name="" id="" rows="3" placeholder="Add Your Tag"></textarea>
      </div>


        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Add</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
      </div> --}}


@endsection
