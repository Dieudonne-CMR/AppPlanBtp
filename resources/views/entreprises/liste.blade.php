@extends('layouts.apps')
@section('content')

<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
  <h6 class="fw-semibold mb-0">Liste des Entreprise</h6>
  <ul class="d-flex align-items-center gap-2">
    <li class="fw-medium">
      <a href="#" class="d-flex align-items-center gap-1 hover-text-primary">
        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
        Dashboard
      </a>
    </li>
    <li>-</li>
    <li class="fw-medium">Liste des Entreprise</li>
  </ul>
</div>
    
    <div class="card basic-data-table">
      <div class="card-header">
        <h5 class="card-title mb-0">Liste des Entreprise</h5>
      </div>
      @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Oups !</strong> Il y a eu des problèmes avec votre saisie.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
      <div class="card-body">
        <table class="table bordered-table mb-0" id="dataTable" data-page-length='10'>
          <thead>
            <tr>
              <th scope="col">
                <div class="form-check style-check d-flex align-items-center">
                  <input class="form-check-input" type="checkbox">
                  <label class="form-check-label">
                    S.L
                  </label>
                </div>
              </th>
              {{-- <th scope="col">Invoice</th> --}}
              <th scope="col">Name</th>
              <th scope="col">Date de creation</th>
              <th scope="col">Amount</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($entreprises as $entreprise)
                <tr>
                <td>
                    <div class="form-check style-check d-flex align-items-center">
                    <input class="form-check-input" type="checkbox">
                    <label class="form-check-label">
                        01 
                    </label>
                    </div>
                </td>
                {{-- <td><a href="javascript:void(0)" class="text-primary-600">#526534</a></td> --}}
                <td>
                    <div class="d-flex align-items-center">
                        <form action="{{route('admin.showEntreprise')}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-link text-primary-600 p-0 m-0 d-flex align-items-center">
                                <img src="{{asset('storage/'.$entreprise->logo)}}" alt="" class="flex-shrink-0 me-12 radius-8" style="width: 4rem;">
                                <h6 class="text-md mb-0 fw-medium flex-grow-1">{{$entreprise->nom}}</h6>
                            </button>
                            <input type="hidden" name="id" value="{{$entreprise->id}}">
                        </form>
                        {{-- <a href="{{route('admin.showEntreprise', $entreprise->id)}}" class="d-flex align-items-center text-primary-600"> --}}
                            {{-- <img src="{{asset('storage/'.$entreprise->logo)}}" alt="" class="flex-shrink-0 me-12 radius-8" style="width: 4rem;"> --}}
                            {{-- <h6 class="text-md mb-0 fw-medium flex-grow-1">{{$entreprise->nom}}</h6> --}}
                            {{-- <img src="{{asset('storage/'.$entreprise->logo)}}" alt="" class="flex-shrink-0 me-12 radius-8" style="width: 4rem;">
                            <h6 class="text-md mb-0 fw-medium flex-grow-1">{{$entreprise->nom}}</h6> --}}
                        {{-- </a> --}}
                    </div>
                </td>
                <td>{{$entreprise->created_at}}</td>
                <td>$200.00</td>
                <td> <span class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Paid</span> </td>
                <td>
                    <a href="javascript:void(0)" class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                    <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                    </a>
                    <a href="javascript:void(0)" class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                    <iconify-icon icon="lucide:edit"></iconify-icon>
                    </a>
                    <a href="javascript:void(0)" class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                    <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                    </a>
                </td>
                </tr>
            @endforeach
            
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection