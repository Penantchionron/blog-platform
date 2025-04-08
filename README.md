# 💡 Blog Multifonction – Plateforme de contenus numériques

Bienvenue sur le dépôt officiel du projet *Blog Multifonction* !  
Il s'agit d'une application web moderne permettant de :

- 📚 Vendre des fichiers PDF
- 📰 Lire des articles de blog
- 🎥 Suivre des vidéos utiles (formation, installations, etc.)
- 💬 Commenter et poser des questions
- 💳 Effectuer des paiements via PayPal, Mobile Money, et USDT

---

## 🔧 Fonctionnalités principales

- Système de connexion / inscription avec rôles (admin, utilisateur)
- Gestion des articles, PDF et vidéos
- Zone membre premium et accès restreint
- Commentaires sur les articles
- Envoi de messages/questions depuis le site
- Paiements sécurisés via plusieurs passerelles (PayPal Business, Mobile Money, USDT)
- Panneau admin + panneau utilisateur avec navigation dynamique
- Support multithématique : Trading, Développement Web & Mobile, Formations logicielles

---

## 🚀 Technologies utilisées

| Technologie      | Description                                 |
|------------------|---------------------------------------------|
| *Laravel*      | Framework PHP backend robuste               |
| *Livewire*     | Composants dynamiques côté serveur          |
| *AdminLTE*     | Template d'administration responsive        |
| *EditorJS*     | Éditeur moderne pour la création d’articles |
| *Spatie*       | Gestion des rôles et permissions            |
| *MediaLibrary* | Upload et gestion avancée de médias         |
| *PDF.js*       | Affichage des PDF dans le navigateur        |
| *Node.js*      | Dépendances front et build éventuels        |
| *Composer*     | Gestionnaire de dépendances PHP             |
| *Git & GitHub* | Suivi de version et collaboration           |
| *XAMPP*        | Environnement de développement local        |
| *Cusor AI*     | Intégration future pour chatbot intelligent |

---

##✨ Auteur
Développé avec ❤ par CAMARA Penantchionron Siaka

##📜 Licence
Ce projet est sous la licence Mozilla Public License 2.0.
Vous êtes libre d'utiliser, modifier et redistribuer le code à condition de mentionner l'auteur et de contribuer en retour.

---
## ✅ Installation rapide (local)
```bash
git clone https://github.com/Penantchionron/blog-platform.git
cd blog-platform
composer install
npm install && npm run dev
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan serve
