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
            <th scope="col">Category name</th>
            <th scope="col">NO.of Posts</th>
            <th scope="col">action</th>
        </tr>
    </thead>
    <tbody>

        <?php $i=1;?>
        @foreach ($categories as $category)
        <tr>
            <th scope="row"><?php echo $i;?></th>
            <?php  $i++;?>
            <td>{{$category->name}}</td>
            <td>{{$category->posts->count()}}</td>
            <td>
                <small style="color: blue;margin-left: 5px;"><button class="btn" data-toggle="modal"
                    data-target="#editCategory{{$category->id}}" and style="background-color:transparent">Edit</button></small>||
                <small style="color: red;margin-left: 5px;"><button class="btn" and
                    data-toggle="modal" data-target="#deleteCategory{{$category->id}}"
                        style="background-color:transparent">Delete</button></small>


            </td>
        </tr>


               {{--  ############################   delete category   ############################# --}}
               <div class="modal fade" id="deleteCategory{{$category->id}}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                   <div class="modal-content">
                       <div class="modal-header">
                           <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                               id="exampleModalLabel">Are you sure you want to delete this category??

                           </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                           </button>
                       </div>
                       <div class="modal-body">
                           <!-- add_form -->
                           <form action="{{ route('category.destroy',$category->id) }}" method="POST">
                               @csrf
                               @method('delete')

                               <div class="form-group">
                                   <label
                                       for="exampleFormControlTextarea1">
                                       </label>
                                   <textarea class="form-control" name="name" id="exampleFormControlTextarea1"
                                             rows="3" placeholder="Add your category">{{$category->name}}</textarea>
                               </div>
                               <br><br>
                       </div>
                       <div class="modal-footer">
                           <button type="button" class="btn btn-secondary"
                                   data-dismiss="modal">close</button>
                           <button type="submit"
                                   class="btn btn-success">Yes</button>
                       </div>
                       </form>

                   </div>
                </div>
                </div>



       {{--  ############################   edit category   ############################# --}}
        <div class="modal fade" id="editCategory{{$category->id}}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                   <div class="modal-header">
                       <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                           id="exampleModalLabel">Edit Category

                       </h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                       </button>
                   </div>
                   <div class="modal-body">
                       <!-- add_form -->
                       <form action="{{ route('category.update',$category->id) }}" method="POST">
                           @csrf
                           @method('PUT')

                           <div class="form-group">
                               <label
                                   for="exampleFormControlTextarea1">
                                   </label>
                               <textarea class="form-control" name="name" id="exampleFormControlTextarea1"
                                         rows="3" placeholder="Add your category">{{$category->name}}</textarea>
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
{{-- #############################   create category ########################## --}}
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCategory"
    style="background-color: black;margin-left: 50px;float: right;margin-right:20px;"
    >Add Category</button>

<div class="modal fade" id="addCategory" tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
   <div class="modal-content">
       <div class="modal-header">
           <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
               id="exampleModalLabel">Add Category

           </h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
           </button>
       </div>
       <div class="modal-body">
           <!-- add_form -->
           <form action="{{ route('category.store') }}" method="POST">
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

</div>


@endsection
