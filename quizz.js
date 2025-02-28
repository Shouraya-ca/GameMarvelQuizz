document.addEventListener("DOMContentLoaded", function() {
    setTimeout(function() {
      document.querySelector('.throneofdoom').classList.add('transformed');
      document.getElementById('doctorDoomImage').style.opacity = '1';
    }, 2000); // Ajustez le délai selon vos besoins
  
    setTimeout(function() {
      document.querySelector('.health-bar').classList.add('visible');
    }, 3000); // Ajustez le délai selon vos besoins
  });
  
  setTimeout(function() {
    document.querySelectorAll('.heart').forEach(function(heart) {
      heart.classList.add('visible');
    });
  }, 3000);
  
  
  // Affiche le conteneur de dialogue après un délai
  setTimeout(function() {
    document.querySelector('.dialogue-container').classList.add('visible');
  }, 5000);
  
  // Gestion des dialogues
  setTimeout(function() {
    document.getElementById('dialogue1-1').style.display = 'block';
  }, 6000); // Affiche le premier dialogue du personnage 1
  
  setTimeout(function() {
    document.getElementById('dialogue1-1').style.display = 'none';
    document.getElementById('dialogue2-1').style.display = 'block';
  }, 7000); // Affiche le premier dialogue du personnage 2
  
  setTimeout(function() {
    document.getElementById('dialogue2-1').style.display = 'none';
    document.getElementById('dialogue1-2').style.display = 'block';
  }, 8000); // Affiche le deuxième dialogue du personnage 1
  
  setTimeout(function() {
    document.getElementById('dialogue1-2').style.display = 'none';
    document.getElementById('dialogue2-2').style.display = 'block';
  }, 9000); // Affiche le deuxième dialogue du personnage 2
  
  setTimeout(function() {
    document.querySelector('.dialogue-container').style.display = 'none';
    document.querySelector('.quiz-container').style.display = 'block';
  }, 10000); // Affiche le quiz
  