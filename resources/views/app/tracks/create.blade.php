<x-app title="Contribuer">

    <main class="container-wide space-y-8">
        <section>
            <h1>
                Contribuer <small>2024-S37</small>
            </h1>

            <form method="post" action="{{ route('tracks.store') }}" class="track-form space-y-4">
                @csrf

                <div>
                    <label for="title">Titre</label>
                    <input name="title" id="title" class="w-large" type="text" value="" placeholder="nom du titre" autocomplete="off" autofocus required>
                </div>

                <div>
                    <label for="artist_name">Artiste</label>
                    <input name="artist_name" id="artist_name" class="w-medium" type="text" value="" placeholder="nom de l'artiste" autocomplete="off" required>
                </div>

                <div>
                    <label for="listen_link">Lien d'écoute</label>
                    <input name="listen_link" id="listen_link" class="w-medium" type="text" value="" placeholder="lien youtube ou soundcloud" autocomplete="off" required>
                </div>

                <p class="error-message">Exemple de message d'erreur</p>

                <div class="submit">
                    <button type="submit" class="primary">Envoyer</button>
                </div>
            </form>
        </section>
    </main>

</x-app>
