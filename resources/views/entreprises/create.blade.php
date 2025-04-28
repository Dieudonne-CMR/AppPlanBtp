@extends('layouts.apps')
@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
    <style>.iti { width: 100%; } </style> {{-- Pour que ça prenne toute la largeur --}}
@endpush

@section('content')

<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Créer une Entreprise</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
            <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                Dashboard
            </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Créer une Entreprise</li>
        </ul>
    </div>
    
    <div class="row gy-4">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title mb-0">Créer une Entreprise</h5>
          </div>
          <div class="card-body">
            <form class="row gy-3 needs-validation" action="{{route('admin.createEntreprise')}}" method="POST" enctype="multipart/form-data" novalidate>
                
                @csrf
              <div class="col-md-6">
                <label class="form-label">Nom de l'entreprise</label>
                <input type="text" name="nom" class="form-control" value="" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-md-6">
                <label class="form-label">Address de l'entreprise</label>
                <input type="text" name="adresse" class="form-control" value="adresse" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-md-6">
                <label class="form-label">Téléphone</label>
                <div class="icon-field has-validation">
                  <span class="icon">
                    <iconify-icon icon="solar:phone-calling-linear"></iconify-icon>
                  </span>
                  <input id="telephone" type="tel" name="telephone" placeholder="699-000-0000" {{-- Le name correspondra à la colonne DB --}}
                  class="form-control @error('telephone') is-invalid @enderror"
                  value="{{ old('telephone') }}">
                
                    {{-- <input type="text" name="telephone" class="form-control" placeholder="(+237) 000-0000" required> --}}
                    @error('telephone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
              </div>
              <div class="col-md-6">
                <label class="form-label">Email</label>
                <div class="icon-field has-validation">
                  <span class="icon">
                    <iconify-icon icon="mage:email"></iconify-icon>
                  </span>
                  <input type="email" name="email_contact" class="form-control" placeholder="Enter Email" required>
                  <div class="invalid-feedback">
                    Please provide email address
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <label class="form-label">Logo </label>
                <input class="form-control" type="file" name="logo" required>
                <div class="invalid-feedback">
                  Please choose a file.
                </div>
              </div>

              <div class="col-md-3">
                <label class="form-label">Pays </label>
                  <select id="pays" name="pays_id" class="form-select @error('pays_id') is-invalid @enderror" required>
                    <option>Choisir une ville</option>
                    @foreach ($pays as $pays)
                      {{-- <option value="{{ $pays->id }}">{{ $pays->nom }}</option> --}}
                      <option value="{{ $pays->id }}"
                        {{-- Pour pré-remplir en cas d'édition ou d'erreur de validation --}}
                        {{ old('pays_id', $entreprise->pays_id ?? '') == $pays->id ? 'selected' : '' }}>
                        {{ $pays->nom }}
                    </option>
                    @endforeach
                  </select>
                  @error('pays_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
              </div>

              {{-- Sélecteur de Villes (sera rempli par JS) --}}
                <div class="col-md-3">
                    <label for="ville" class="form-label">Ville</label>
                    <select id="ville" name="ville_id" class="form-select @error('ville_id') is-invalid @enderror" required disabled>
                        {{-- Option initiale --}}
                        <option value="">-- Sélectionnez d'abord un pays --</option>
                        {{-- Les options seront ajoutées ici par JavaScript --}}
                        {{-- Logique pour pré-remplir en cas d'édition/erreur (plus complexe, voir note) --}}
                    </select>
                    @error('ville_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    {{-- Optionnel: Indicateur de chargement --}}
                    <div id="ville-loading" style="display: none;">Chargement des villes...</div>
                </div>
              {{-- </div> --}}

              <div class="col-md-12">
                <label class="form-label"> Description </label>
                <textarea name="description" id="" cols="30" class="form-control" rows="5"></textarea>
              </div>

              <div class="col-12">
                <button class="btn btn-primary-600" type="submit">Submit form</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      {{-- <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title mb-0">Input Status</h5>
          </div>
          <div class="card-body">
            <form class="row gy-3 needs-validation" novalidate>
              <div class="col-md-6">
                <label class="form-label">First Name</label>
                <div class="icon-field has-validation">
                  <span class="icon">
                    <iconify-icon icon="f7:person"></iconify-icon>
                  </span>
                  <input type="text" name="#0" class="form-control" placeholder="Enter First Name" required>
                  <div class="invalid-feedback">
                    Please provide first name
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <label class="form-label">Last Name</label>
                <div class="icon-field has-validation">
                  <span class="icon">
                    <iconify-icon icon="f7:person"></iconify-icon>
                  </span>
                  <input type="text" name="#0" class="form-control" placeholder="Enter Last Name" required>
                  <div class="invalid-feedback">
                    Please provide last name
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <label class="form-label">Email</label>
                <div class="icon-field has-validation">
                  <span class="icon">
                    <iconify-icon icon="mage:email"></iconify-icon>
                  </span>
                  <input type="email" name="#0" class="form-control" placeholder="Enter Email" required>
                  <div class="invalid-feedback">
                    Please provide email address
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <label class="form-label">Phone</label>
                <div class="icon-field has-validation">
                  <span class="icon">
                    <iconify-icon icon="solar:phone-calling-linear"></iconify-icon>
                  </span>
                  <input type="text" name="#0" class="form-control" placeholder="+1 (555) 000-0000" required>
                  <div class="invalid-feedback">
                    Please provide phone number
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <label class="form-label">Password</label>
                <div class="icon-field has-validation">
                  <span class="icon">
                    <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                  </span>
                  <input type="password" name="#0" class="form-control" placeholder="*******" required>
                  <div class="invalid-feedback">
                    Please provide password
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <label class="form-label">Confirm Password</label>
                <div class="icon-field has-validation">
                  <span class="icon">
                    <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                  </span>
                  <input type="password" name="#0" class="form-control" placeholder="*******" required>
                  <div class="invalid-feedback">
                    Please confirm password
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <button class="btn btn-primary-600" type="submit">Submit form</button>
              </div>
            </form>
          </div>
        </div>
      </div> --}}
    </div>

  </div>

  @endsection

  @push('scripts')
   <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
   <script>
        document.addEventListener('DOMContentLoaded', function() {
        const phoneInputField = document.querySelector("#telephone");
        // Initialisation de intl-tel-input
        const phoneInput = window.intlTelInput(phoneInputField, {
            // Options courantes :
             utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js", // Nécessaire pour validation/formatage
            initialCountry: "auto", // Détecte le pays par IP (nécessite configuration ou bibliothèque tierce)
            geoIpLookup: function(callback) {
               fetch('https://ipinfo.io/json', { headers: { 'Accept': 'application/json' }})
                 .then(response => response.json())
                 .then(data => callback(data.country)) // utilise le code pays (ex: "FR", "US")
                 .catch(() => callback('fr')); // fallback sur 'fr' par exemple
            },
            preferredCountries: ['fr', 'ci', 'be', 'ch', 'ca'], // Pays mis en avant
            separateDialCode: true, // Affiche l'indicatif séparément
            // nationalMode: false, // false: s'attend à l'indicatif; true: s'attend au numéro local
        });

        // Optionnel: Mettre à jour un champ caché avec le numéro international complet
        // const form = phoneInputField.closest('form');
        // const hiddenInput = document.querySelector("#telephone_complet_hidden");
        // form.addEventListener('submit', function() {
        //     if (phoneInput.isValidNumber()) { // Vérifie si le numéro est valide selon la lib
        //         hiddenInput.value = phoneInput.getNumber(); // Récupère le numéro au format E.164 (+33...)
        //     } else {
        //         // Gérer le cas où le numéro n'est pas valide côté client
        //         console.warn("Numéro de téléphone invalide");
        //         // Peut-être empêcher la soumission ou afficher une erreur ici
        //     }
        // });
    });
   </script>
   <script>
    document.addEventListener('DOMContentLoaded', function () {
        const paysSelect = document.getElementById('pays');
        const villeSelect = document.getElementById('ville');
        const villeLoading = document.getElementById('ville-loading');

        // Fonction pour charger les villes
        function chargerVilles(paysId) {
            // Si aucun pays n'est sélectionné, réinitialiser et désactiver le select des villes
            if (!paysId) {
                villeSelect.innerHTML = '<option value="">-- Sélectionnez d\'abord un pays --</option>';
                villeSelect.disabled = true;
                return;
            }

            // Afficher l'indicateur de chargement et désactiver le select
            villeLoading.style.display = 'block';
            villeSelect.disabled = true;
            villeSelect.innerHTML = '<option value="">Chargement...</option>'; // Message pendant le chargement

            // Construire l'URL pour la requête AJAX
            // !! Important: Assurez-vous que cette URL correspond à votre route !!
            const url = `/get-villes-by-pays/${paysId}`;

            // Effectuer la requête AJAX (fetch API)
            fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`Erreur HTTP: ${response.status}`);
                    }
                    return response.json(); // Parser la réponse JSON
                })
                .then(villes => {
                    // Cacher l'indicateur de chargement et réactiver le select
                    villeLoading.style.display = 'none';
                    villeSelect.disabled = false;
                    villeSelect.innerHTML = ''; // Vider les options précédentes

                    // Ajouter une option par défaut
                    villeSelect.add(new Option('-- Sélectionnez une ville --', ''));

                    // Ajouter les nouvelles options de villes
                    if (villes.length > 0) {
                        villes.forEach(ville => {
                            villeSelect.add(new Option(ville.nom, ville.id));
                        });
                    } else {
                        // Aucune ville trouvée
                         villeSelect.innerHTML = '<option value="">Aucune ville trouvée pour ce pays</option>';
                         villeSelect.disabled = true; // Désactiver si aucune ville
                    }

                    // ** Logique pour pré-sélectionner une ville (si nécessaire pour édition/old input) **
                    // Exemple simple : si une variable JS 'selectedVilleId' existe
                    // if (typeof selectedVilleId !== 'undefined' && selectedVilleId) {
                    //     villeSelect.value = selectedVilleId;
                    //     // Réinitialiser pour ne pas le faire à chaque changement de pays
                    //     selectedVilleId = null; 
                    // }


                })
                .catch(error => {
                    console.error('Erreur lors du chargement des villes:', error);
                    villeLoading.style.display = 'none';
                    villeSelect.disabled = true;
                    villeSelect.innerHTML = '<option value="">Erreur de chargement</option>';
                });
        }

        // Écouter les changements sur le sélecteur de pays
        paysSelect.addEventListener('change', function () {
            const selectedPaysId = this.value;
            chargerVilles(selectedPaysId);
        });

        // ** Logique pour le chargement initial (édition / old input) **
        // Si un pays est déjà sélectionné au chargement de la page
        const initialPaysId = paysSelect.value;
        if (initialPaysId) {
             // Définir l'ID de la ville qui doit être sélectionnée (à passer depuis le contrôleur si édition)
             // const selectedVilleId = "{{ old('ville_id', $entreprise->ville_id ?? '') }}"; // Attention à l'injection JS
             
             // Il est plus sûr de passer l'ID via un attribut data-* ou une variable JS globale définie en haut
             // Exemple: <select id="ville" ... data-selected-ville="{{ old('ville_id', $entreprise->ville_id ?? '') }}">
             // const selectedVilleId = villeSelect.dataset.selectedVille;

             // Appeler chargerVilles. La logique de pré-sélection devra être DANS la fonction chargerVilles
             // ou exécutée après le chargement des villes (dans le .then())
             chargerVilles(initialPaysId); 
             // La pré-sélection est délicate car elle doit se faire *après* que les options soient chargées.
        }

    });
</script>
   
   
@endpush