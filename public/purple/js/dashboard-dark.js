(function ($) {
  'use strict';
  if ($("#visit-sale-chart").length) {
    const ctx = document.getElementById('visit-sale-chart');

    const colorViolet = 'rgba(154, 85, 255, 1)';
    const colorBlue = 'rgba(54, 215, 232, 1)';
    const colorRed = 'rgba(254, 112, 150, 1)';

    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG'],
        datasets: [
          {
            label: "CHN",
            borderColor: colorViolet,
            backgroundColor: colorViolet,
            hoverBackgroundColor: colorViolet,
            borderWidth: 2,
            data: [20, 40, 15, 35, 25, 50, 30, 20],
            barPercentage: 0.5,
            categoryPercentage: 0.5,
          },
          {
            label: "USA",
            borderColor: colorRed,
            backgroundColor: colorRed,
            hoverBackgroundColor: colorRed,
            borderWidth: 2,
            data: [40, 30, 20, 10, 50, 15, 35, 40],
            barPercentage: 0.5,
            categoryPercentage: 0.5,
          },
          {
            label: "UK",
            borderColor: colorBlue,
            backgroundColor: colorBlue,
            hoverBackgroundColor: colorBlue,
            borderWidth: 2,
            data: [70, 10, 30, 40, 25, 50, 15, 30],
            barPercentage: 0.5,
            categoryPercentage: 0.5,
          }
        ]
      },
      options: {
        responsive: true,
        maintainAspectRatio: true,
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
      }
    });
  }

  if ($("#traffic-chart").length) {
    const ctx = document.getElementById('traffic-chart');

    const colorBlue = 'rgba(54, 215, 232, 1)';
    const colorRed = 'rgba(254, 112, 150, 1)';
    const colorGreen = 'rgba(6, 185, 157, 1)';

    new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ['Search Engines 30%', 'Direct Click 30%', 'Bookmarks Click 40%'],
        datasets: [{
          data: [30, 30, 40],
          backgroundColor: [colorBlue, colorGreen, colorRed],
          hoverBackgroundColor: [colorBlue, colorGreen, colorRed],
          borderColor: ['#ffffff', '#ffffff', '#ffffff'],
          borderWidth: 3,
        }]
      },
      options: {
        cutout: 50,
        responsive: true,
        maintainAspectRatio: true,
        plugins: {
          legend: {
            display: false,
          }
        }
      }
    });
  }
})(jQuery);
