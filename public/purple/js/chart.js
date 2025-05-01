(function ($) {
  'use strict';
  if ($("#visit-sale-chart").length) {
    const ctx = document.getElementById('visit-sale-chart');

    const colorSecondary = '#578856';
    const colorRed = '#C03D2D';
    const colorBlue = '#04889E';

    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG'],
        datasets: [
          {
            label: "Teachers",
            backgroundColor: colorSecondary,
            hoverBackgroundColor: colorSecondary,
            pointRadius: 0,
            fill: false,
            borderWidth: 0,
            data: [5, 12, 8, 10, 15, 30, 25, 19],
            barPercentage: 0.5,
            categoryPercentage: 0.5,
          },
          {
            label: "RPL",
            backgroundColor: colorRed,
            hoverBackgroundColor: colorRed,
            pointRadius: 0,
            fill: false,
            borderWidth: 0,
            data: [20, 30, 24, 14, 32, 15, 35, 40],
            barPercentage: 0.5,
            categoryPercentage: 0.5,
          },
          {
            label: "DKV",
            backgroundColor: colorBlue,
            hoverBackgroundColor: colorBlue,
            pointRadius: 0,
            fill: false,
            borderWidth: 0,
            data: [32, 10, 30, 29, 25, 35, 15, 30],
            barPercentage: 0.5,
            categoryPercentage: 0.5,
          }
        ]
      },
      options: {
        responsive: true,
        maintainAspectRatio: true,
        elements: {
          line: {
            tension: 0.4,
          },
        },
        scales: {
          y: {
            display: false,
            grid: {
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
            },
          },
          x: {
            display: true,
            grid: {
              display: false,
            },
          }
        },
        plugins: {
          legend: {
            display: false,
          }
        }
      },
      plugins: [{
        afterDatasetUpdate: function (chart, args, options) {
          const chartId = chart.canvas.id;
          const legendId = `${chartId}-legend`;
          const ul = document.createElement('ul');
          chart.data.datasets.forEach(dataset => {
            ul.innerHTML += `
              <li>
                <span style="background-color: ${dataset.backgroundColor}; border: 2px solid black; display:inline-block; width:12px; height:12px; border-radius:50%; margin-right:5px;"></span>
                ${dataset.label}
              </li>
            `;
          });
          const legendContainer = document.getElementById(legendId);
          if (legendContainer) legendContainer.appendChild(ul);
        }
      }]
    });
  }

  if ($("#traffic-chart").length) {
    const ctx = document.getElementById('traffic-chart');

    const colorSecondary = '#578856'; // Audiobooks
    const colorRed = '#C03D2D';       // Journals
    const colorBlue = '#04889E';      // E-Books
    const colorBlack = '#000000';

    new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ['E-Books 40%', 'Audiobooks 35%', 'Journals 25%'],
        datasets: [{
          data: [40, 35, 25],
          backgroundColor: [colorBlue, colorSecondary, colorRed],
          hoverBackgroundColor: [colorBlue, colorSecondary, colorRed],
          borderColor: [colorBlack, colorBlack, colorBlack],
          borderWidth: 3,
          legendColor: [colorBlue, colorSecondary, colorRed]
        }]
      },
      options: {
        cutout: 50,
        animationEasing: "easeOutBounce",
        animateRotate: true,
        animateScale: false,
        responsive: true,
        maintainAspectRatio: true,
        showScale: true,
        legend: false,
        plugins: {
          legend: {
            display: false,
          }
        }
      },
      plugins: [{
        afterDatasetUpdate: function (chart, args, options) {
          const chartId = chart.canvas.id;
          const legendId = `${chartId}-legend`;
          const ul = document.createElement('ul');
          for (let i = 0; i < chart.data.datasets[0].data.length; i++) {
            ul.innerHTML += `
              <li>
                <span style="background-color: ${chart.data.datasets[0].legendColor[i]}; border: 2px solid black; display:inline-block; width:12px; height:12px; border-radius:50%; margin-right:5px;"></span>
                ${chart.data.labels[i]}
              </li>
            `;
          }
          const legendContainer = document.getElementById(legendId);
          if (legendContainer) legendContainer.appendChild(ul);
        }
      }]
    });
  }

})(jQuery);
