const ctx2 = document.getElementById('pie');

  new Chart(ctx2, {
    type: 'pie',
    data: {
      labels: ['karinderia', 'barbero', 'pancitan', 'sarisari-store', 'talipapa', 'marts'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
  