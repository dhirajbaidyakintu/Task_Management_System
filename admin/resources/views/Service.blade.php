@extends('layout.app')
@section('content')
    <!--For Our Main Service Section-->
    <div id="mainDIV" class="container d-none">
        <div class="row">
            <div class="col-md-12 p-5">
                <button id="addNewBtnId" class="btn my-3 btn-sm btn-danger">Add New</button>
                <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="th-sm">Title</th>
                        <th class="th-sm">Description</th>
                        <th class="th-sm">Task File</th>
                        <th class="th-sm">Deadline</th>
                        <th class="th-sm">Edit</th>
                        <th class="th-sm">Delete</th>
                    </tr>
                    </thead>
                    <tbody id="service_table">
                    <!--For Service Table-->
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <!--For Loader Animation Until Data Not Load-->
    <div id="loaderDIV" class="container">
        <div class="row">
            <div class="col-md-12 p-5 m-5 text-center">
                <img class="loading-icon" src="{{asset('images/loader.svg')}}">
            </div>
        </div>
    </div>



    <!--For Loader Animation, If Data not Found-->
    <div id="wrongDIV" class="container d-none">
        <div class="row">
            <div class="col-md-12 p-5 text-center">
                <h3>Something Went Wrong!</h3>
            </div>
        </div>
    </div>



    <!--For Service Delete Modal--><!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body p-3 text-center">
                    <h5 class="mt-4">Do You Want To Delete This Task?</h5>
                    <h5 id="serviceDeleteId" class="mt-4">  </h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
                    <button id="serviceDeleteConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Yes</button>
                </div>
            </div>
        </div>
    </div>



    <!--For Service Edit Modal--><!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Task</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-4 text-center">
                    <h5 id="serviceEditId" class="mt-4 ">   </h5>
                    <div id="serviceEditForm" class="d-none w-100">
                        <input id="serviceNameID" type="text" class="form-control mb-4" placeholder="Task Title">
                        <input id="serviceDesID" type="text" class="form-control mb-4" placeholder="Task Description">
                        <input id="serviceImgID" type="text" class="form-control mb-4" placeholder="Task File">
                        <input id="serviceDeadlineID" type="text" class="form-control mb-4" placeholder="Task Deadline">
                    </div>
                    <img id="serviceEditLoader" class="loading-icon m-5" src="{{asset('images/loader.svg')}}">
                    <h5 id="serviceEditWrong" class="d-none">Something Went Wrong !</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                    <button  id="serviceEditConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
                </div>
            </div>
        </div>
    </div>



    <!--For Service Add Modal--><!-- Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body p-5 text-center">
                    <div id="serviceAddForm" class=" w-100">
                        <h6 class="mb-4">Add New Service</h6>
                        <input id="serviceNameAddID" type="text" class="form-control mb-4" placeholder="Task Title">
                        <input id="serviceDesAddID" type="text"  class="form-control mb-4" placeholder="Task Description">
                        <input id="serviceImgAddID" type="text"  class="form-control mb-4" placeholder="Task File">
                        <input id="serviceDeadlineAddID" type="text"  class="form-control mb-4" placeholder="Task Deadline">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                    <button  id="serviceAddConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('script')
        <script type="text/javascript">
            getServicesData();
            //For Service Table
            function getServicesData() {
                axios.get('/getServicesData')
                    .then(function(response) {
                        if (response.status == 200) {
                            $('#mainDIV').removeClass('d-none');
                            $('#loaderDIV').addClass('d-none');

                            $('#service_table').empty();

                            var jsonData = response.data;
                            $.each(jsonData, function(i, items) {
                                $('<tr>').html(
                                    "<td>" + jsonData[i].task_title+"</td>"+
                                    "<td>" + jsonData[i].task_des+"</td>"+
                                    "<td>" + jsonData[i].task_file+"</td>"+
                                    "<td>" + jsonData[i].task_deadline+"</td>"+
                                    "<td><a class='serviceEditBtn' data-id="+jsonData[i].id+"><i class='fas fa-edit'></i></a></td>" +
                                    "<td><a class='serviceDeleteBtn' data-id="+jsonData[i].id+"><i class='fas fa-trash-alt'></i></a></td>"
                                ).appendTo('#service_table');
                            });
                            //Service Table Delete Icon Click
                            $('.serviceDeleteBtn').click(function() {
                                var id = $(this).data('id');
                                $('#serviceDeleteId').html(id);
                                $('#deleteModal').modal('show');
                            });
                            //Service Table Edit Icon Click
                            $('.serviceEditBtn').click(function() {
                                var id = $(this).data('id');
                                $('#serviceEditId').html(id);
                                ServiceUpdateDetails(id);
                                $('#editModal').modal('show');
                            });
                        } else {
                            $('#loaderDIV').addClass('d-none');
                            $('#wrongDIV').removeClass('d-none');
                        }
                    }).catch(function(error) {
                    $('#loaderDIV').addClass('d-none');
                    $('#wrongDIV').removeClass('d-none');
                });
            }



            //Service DeleteModal Yes Btn
            $('#serviceDeleteConfirmBtn').click(function() {
                var id = $('#serviceDeleteId').html();
                ServiceDelete(id);
            });
            //For Service Delete
            function ServiceDelete(deleteID) {
                $('#serviceDeleteConfirmBtn').html("<div class='spinner-border text-light' role='status'></div>") //For Loading Animation
                axios.post('/serviceDelete', {
                    id: deleteID
                })
                    .then(function(response) {
                        $('#serviceDeleteConfirmBtn').html("Save");//For Animation Stop
                        if(response.status==200){
                            if (response.data == 1) {
                                $('#deleteModal').modal('hide');
                                toastr.success('Data Delete Success.');
                                getServicesData();
                            } else {
                                $('#deleteModal').modal('hide');
                                toastr.error('Data Delete Failed.');
                                getServicesData();
                            }
                        }else{
                            $('#deleteModal').modal('hide');
                            toastr.error('Something Went Wrong!');
                        }
                    })
                    .catch(function() {
                        $('#deleteModal').modal('hide');
                        toastr.error('Something Went Wrong!');
                    });
            }




            //For Services Update Details
            function ServiceUpdateDetails(detailsID) {
                axios.post('/serviceDetails', {
                    id: detailsID
                }).then(function(response) {
                    if (response.status==200){

                        $('#serviceEditForm').removeClass('d-none');
                        $('#serviceEditLoader').addClass('d-none');

                        var jsonData = response.data;
                        $('#serviceNameID').val(jsonData[0].task_title);
                        $('#serviceDesID').val(jsonData[0].task_des);
                        $('#serviceImgID').val(jsonData[0].task_file);
                        $('#serviceDeadlineID').val(jsonData[0].task_deadline);
                    }else {
                        $('#serviceEditLoader').addClass('d-none');
                        $('#serviceEditWrong').removeClass('d-none');
                    }
                }).catch(function() {
                    $('#serviceEditLoader').addClass('d-none');
                    $('#serviceEditWrong').removeClass('d-none');
                });
            }




            //Service Edit Modal Save Btn
            $('#serviceEditConfirmBtn').click(function() {
                var id = $('#serviceEditId').html();
                var name = $('#serviceNameID').val();
                var des = $('#serviceDesID').val();
                var img = $('#serviceImgID').val();
                var deadline = $('#serviceDeadlineID').val();
                ServiceUpdate(id,name,des,img,deadline);
            })
            //For Services Update
            function ServiceUpdate(serviceID, serviceName, serviceDes, serviceImg, serviceDeadline) {
                if(serviceName.length==0){
                    toastr.error('Service Name is Empty!');
                }else if(serviceDes.length==0){
                    toastr.error('Service Description is Empty!');
                }else if(serviceImg.length==0){
                    toastr.error('Service Image is Empty!');
                }else if(serviceDeadline.length==0){
                    toastr.error('Service Image is Empty!');
                }else {

                    $('#serviceEditConfirmBtn').html("<div class='spinner-border text-light' role='status'></div>") //For Loading Animation

                    axios.post('/serviceUpdate', {id:serviceID, task_title:serviceName, task_des:serviceDes, task_file:serviceImg, task_deadline:serviceDeadline})
                        .then(function(response) {
                            $('#serviceEditConfirmBtn').html("Save");//For Animation Stop
                            if (response.status==200){
                                if (response.data == 1) {
                                    $('#editModal').modal('hide');
                                    toastr.success('Update Success.');
                                    getServicesData();
                                } else {
                                    $('#editModal').modal('hide');
                                    toastr.error('Update Failed.');
                                    getServicesData();
                                }
                            }else{
                                $('#editModal').modal('hide');
                                toastr.error('Something Went Wrong!');
                            }
                        }).catch(function() {
                        $('#editModal').modal('hide');
                        toastr.error('Something Went Wrong!');
                    });
                }
            }




            //For Service Add New Button Chick
            $('#addNewBtnId').click(function (){
                $('#addModal').modal('show');
            })
            //Service Edit Modal Save Btn
            $('#serviceAddConfirmBtn').click(function() {
                var name = $('#serviceNameAddID').val();
                var des = $('#serviceDesAddID').val();
                var img = $('#serviceImgAddID').val();
                var deadline = $('#serviceDeadlineAddID').val();
                ServiceAdd(name,des,img,deadline);
            })
            //For Service Add
            function ServiceAdd(serviceName, serviceDes, serviceImg, serviceDeadline) {
                if(serviceName.length==0){
                    toastr.error('Task title is Empty!');
                }else if(serviceDes.length==0){
                    toastr.error('Task Description is Empty!');
                }else if(serviceImg.length==0){
                    toastr.error('Task File is Empty!');
                }else if(serviceDeadline.length==0) {
                    toastr.error('Task Deadline is Empty!');
                } else {

                    $('#serviceAddConfirmBtn').html("<div class='spinner-border text-light' role='status'></div>") //For Loading Animation

                    axios.post('/serviceAdd', {
                        task_title:serviceName,
                        task_des:serviceDes,
                        task_file:serviceImg,
                        task_deadline:serviceDeadline
                    }).then(function(response) {
                        $('#serviceAddConfirmBtn').html("Save");//For Animation Stop
                        if (response.status==200){
                            if (response.data == 1) {
                                $('#addModal').modal('hide');
                                toastr.success('Add Success.');
                                getServicesData();
                            } else {
                                $('#addModal').modal('hide');
                                toastr.error('Add Failed.');
                                getServicesData();
                            }
                        }else{
                            $('#addModal').modal('hide');
                            toastr.error('Something Went Wrong!');
                        }
                    }).catch(function() {
                        $('#addModal').modal('hide');
                        toastr.error('Something Went Wrong!');
                    });
                }
            }
        </script>
@endsection
