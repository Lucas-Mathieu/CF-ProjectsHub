<?php include 'partials/header.php'; ?>

<main class="min-h-screen bg-gray-100 text-gray-800">
  <section class="text-center py-20 bg-white shadow-md">
    <div class="max-w-3xl mx-auto">
      <h1 class="text-4xl font-bold mb-4">Bienvenue sur ProjectHub </h1>
      <p class="text-lg mb-8">Partagez vos idées, discutez de projets et collaborez avec la communauté.</p>
      <a href="/login" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-full hover:bg-blue-700 transition">
        Se connecter
      </a>
    </div>
  </section>

  <section class="py-16 bg-gray-50">
    <div class="max-w-5xl mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
      <div class="bg-white rounded-2xl shadow p-6">
        <h2 class="text-3xl font-bold text-blue-600">152</h2>
        <p class="mt-2 text-gray-500">Posts publiés</p>
      </div>
      <div class="bg-white rounded-2xl shadow p-6">
        <h2 class="text-3xl font-bold text-green-500">438</h2>
        <p class="mt-2 text-gray-500">Commentaires</p>
      </div>
      <div class="bg-white rounded-2xl shadow p-6">
        <h2 class="text-3xl font-bold text-purple-500">89</h2>
        <p class="mt-2 text-gray-500">Utilisateurs inscrits</p>
      </div>
    </div>
  </section>
</main>

<?php include 'partials/footer.php'; ?>
