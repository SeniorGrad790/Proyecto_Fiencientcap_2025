<div class="p-6">
    <h2 class="text-2xl font-bold mb-4">Estadísticas de Pacientes</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Gráfico por Sexo -->
        <div class="bg-white shadow rounded p-4">
            <h3 class="text-lg font-semibold mb-2">Distribución de pacientes por sexo</h3>
            <canvas id="sexoChart" width="400" height="400"></canvas>
        </div>

        <!-- Gráfico por Edad -->
        <div class="bg-white shadow rounded p-4">
            <h3 class="text-lg font-semibold mb-2">Distribución etaria</h3>
            <canvas id="edadChart" width="400" height="400"></canvas>
        </div>

        <!-- Gráfico por Barrio -->
         
        <div class="bg-white shadow rounded p-4 col-span-1 md:col-span-2">
            <h3 class="text-lg font-semibold mb-2">Distribución por Barrio</h3>
            <canvas id="barrioChart" width="400" height="400"></canvas>
        </div>

        <!-- Gráfico por Ciudad -->
        <div class="bg-white shadow rounded p-4 col-span-1 md:col-span-2">

            <h3 class="text-lg font-semibold mb-2">Distribución por Ciudad</h3>
            <canvas id="ciudadChart" width="400" height="400"></canvas>
        </div>

        <!-- Gráfico por Síntomas -->
        <div class="bg-white shadow rounded p-4 col-span-1 md:col-span-2">
            <h3 class="text-lg font-semibold mb-2">Síntomas más frecuentes</h3>
            <canvas id="sintomaChart" width="400" height="400"></canvas>
        </div>


    </div>

    @push('scripts')
    <script>
        let ciudadChartInstance = null;
        let sintomaChartInstance = null;
        document.addEventListener('DOMContentLoaded', function () {
            const barrioChart = new Chart(document.getElementById('barrioChart').getContext('2d'), {
                type: 'pie',
                data: {
                    labels: @json($barrioData['labels']),
                    datasets: [{
                        data: @json($barrioData['values']),
                        backgroundColor: [
                            '#3B82F6', '#10B981', '#F59E0B', '#EF4444', '#8B5CF6', '#EC4899', '#6B7280'
                        ],
                    }]
                },
                options: { responsive: false }
            });

            const sexoChart = new Chart(document.getElementById('sexoChart').getContext('2d'), {
                type: 'pie',
                data: {
                    labels: @json($sexoData['labels']),
                    datasets: [{
                        data: @json($sexoData['values']),
                        backgroundColor: ['#3B82F6', '#F472B6'],
                    }]
                },
                options: { responsive: false }
            });

            const edadChart = new Chart(document.getElementById('edadChart').getContext('2d'), {
                type: 'pie',
                data: {
                    labels: @json($edadData['labels']),
                    datasets: [{
                        data: @json($edadData['values']),
                        backgroundColor: ['#FBBF24', '#34D399', '#60A5FA', '#A78BFA', '#F87171'],
                    }]
                },
                options: { responsive: false }
            });

             // Ciudad
            if (ciudadChartInstance) ciudadChartInstance.destroy();
            ciudadChartInstance = new Chart(document.getElementById('ciudadChart').getContext('2d'), {
                type: 'pie',
                data: {
                    labels: @json($ciudadData['labels']),
                    datasets: [{
                        data: @json($ciudadData['values']),
                        backgroundColor: ['#22D3EE', '#6366F1', '#F43F5E', '#10B981', '#F59E0B', '#3B82F6', '#EC4899', '#6B7280', '#F87171', '#A78BFA'],
                    }]
                },
                options: { responsive: false }
            });
            // Síntomas
            if (sintomaChartInstance) sintomaChartInstance.destroy();
            sintomaChartInstance = new Chart(document.getElementById('sintomaChart').getContext('2d'), {
                type: 'pie',
                data: {
                    labels: @json($sintomaData['labels']),
                    datasets: [{
                        data: @json($sintomaData['values']),
                        backgroundColor: ['#F43F5E', '#8B5CF6', '#10B981', '#F59E0B', '#3B82F6', '#EC4899', '#6B7280'],
                    }]
                },
                options: { responsive: false }
            });
        });
    </script>
    @endpush


</div>
