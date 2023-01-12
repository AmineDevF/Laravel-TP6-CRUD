<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Etudiant Form - Laravel TP6 CRUD </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Etudiant</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('etablissement.index') }}" enctype="multipart/form-data">
                        Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('etablissement.update', $etablissement->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nom complet</strong>
                        <input type="text" name="nom" value="{{ $etablissement->nom }}" class="form-control"
                            placeholder="Etudiant nom">
                            @error('nom')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Prenom </strong>
                        <input type="text" name="preno" value="{{ $etablissement->preno }}" class="form-control" placeholder="Etudiant Prenom">
                        @error('preno')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>CIN</strong>
                        <input type="text" name="cin" value="{{ $etablissement->cin }}" class="form-control" placeholder="Etudiant CIN">
                        @error('cin')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nr. Inscription</strong>
                        <input type="text" name="nrInscription" value="{{ $etablissement->nrInscription }}" class="form-control" placeholder="Etudiant nrInscription">
                        @error('nrInscription')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>