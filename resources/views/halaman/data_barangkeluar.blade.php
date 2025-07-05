@extends('main_layout.main')

@section('container')
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h3 class="fw-bold mb-3">Data Barang Keluar</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Tabel Barang Keluar</span>
                        <button
                            class="btn btn-primary btn-round"
                            data-bs-toggle="modal"
                            data-bs-target="#addRowModal">
                            <i class="fa fa-plus me-1"></i>
                            Tambah Barang Keluar
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                        <td>$320,800</td>
                                    </tr>
                                    <tr>
                                        <td>Garrett Winters</td>
                                        <td>Accountant</td>
                                        <td>Tokyo</td>
                                        <td>63</td>
                                        <td>2011/07/25</td>
                                        <td>$170,750</td>
                                    </tr>
                                    <tr>
                                        <td>Ashton Cox</td>
                                        <td>Junior Technical Author</td>
                                        <td>San Francisco</td>
                                        <td>66</td>
                                        <td>2009/01/12</td>
                                        <td>$86,000</td>
                                    </tr>
                                    <tr>
                                        <td>Cedric Kelly</td>
                                        <td>Senior Javascript Developer</td>
                                        <td>Edinburgh</td>
                                        <td>22</td>
                                        <td>2012/03/29</td>
                                        <td>$433,060</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                <h5 class="modal-title">
                    <span class="fw-mediumbold"> New</span>
                    <span class="fw-light"> Row </span>
                </h5>
                <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                >
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <p class="small">
                    Create a new row using this form, make sure you
                    fill them all
                </p>
                <form>
                    <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group form-group-default">
                        <label>Name</label>
                        <input
                            id="addName"
                            type="text"
                            class="form-control"
                            placeholder="fill name"
                        />
                        </div>
                    </div>
                    <div class="col-md-6 pe-0">
                        <div class="form-group form-group-default">
                        <label>Position</label>
                        <input
                            id="addPosition"
                            type="text"
                            class="form-control"
                            placeholder="fill position"
                        />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-default">
                        <label>Office</label>
                        <input
                            id="addOffice"
                            type="text"
                            class="form-control"
                            placeholder="fill office"
                        />
                        </div>
                    </div>
                    </div>
                </form>
                </div>
                <div class="modal-footer border-0">
                <button
                    type="button"
                    id="addRowButton"
                    class="btn btn-primary">
                    Add
                </button>
                <button
                    type="button"
                    class="btn btn-danger"
                    data-dismiss="modal">
                    Close
                </button>
                </div>
            </div>
        </div>
    </div>
@endsection
