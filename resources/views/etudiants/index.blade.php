<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel TP6 CRUD </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Laravel TP6 CRUD</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('etablissement.create') }}"> Create student</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S Nom complet</th>
                    <th>S Prenom </th>
                    <th>S CIN</th>
                    <th>S Nr. Inscription</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($etablissements as $etablissement)
                    <tr>
                        <td>{{ $etablissement->nom }}</td>
                        <td>{{ $etablissement->preno }}</td>
                        <td>{{ $etablissement->cin }}</td>
                        <td>{{ $etablissement->nrInscription }}</td>
                        <td>
                            <form action="{{ route('etablissement.destroy',$etablissement->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('etablissement.edit',$etablissement->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        {!! $etablissements->links() !!}
    </div>
</body>
</html>