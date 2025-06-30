<div class="container mt-4 mb-5">
    <h2 class="mb-4 fw-bold">Estadísticas de Pacientes</h2>

    <div class="row gy-4">
        <!-- Sexo -->
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Distribución por Sexo</h5>
                    <canvas id="sexoChart" height="300"></canvas>
                </div>
            </div>
        </div>

        <!-- Edad -->
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Distribución Etaria</h5>
                    <canvas id="edadChart" height="300"></canvas>
                </div>
            </div>
        </div>

        <!-- Barrio -->
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Distribución por Barrio</h5>
                    <canvas id="barrioChart" height="300"></canvas>
                </div>
            </div>
        </div>

        <!-- Ciudad -->
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Distribución por Ciudad</h5>
                    <canvas id="ciudadChart" height="300"></canvas>
                </div>
            </div>
        </div>

        <!-- Síntomas -->
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Síntomas más frecuentes</h5>
                    <canvas id="sintomaChart" height="300"></canvas>
                </div>
            </div>
        </div>

        <!-- Enfermedades -->
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Enfermedades más diagnosticadas</h5>
                    <canvas id="enfermedadChart" height="300"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    let ciudadChartInstance = null;
    let sintomaChartInstance = null;
    let enfermedadChartInstance = null;

    function renderCharts() {
        // Usamos requestAnimationFrame para garantizar render real del DOM
        requestAnimationFrame(() => {
            const sexoChart = new Chart(document.getElementById('sexoChart'), {
                type: 'pie',
                data: {
                    labels: @json($sexoData['labels']),
                    datasets: [{
                        data: @json($sexoData['values']),
                        backgroundColor: ['#3B82F6', '#F472B6'],
                    }]
                }
            });

            const edadChart = new Chart(document.getElementById('edadChart'), {
                type: 'pie',
                data: {
                    labels: @json($edadData['labels']),
                    datasets: [{
                        data: @json($edadData['values']),
                        backgroundColor: ['#FBBF24', '#34D399', '#60A5FA', '#A78BFA', '#F87171'],
                    }]
                }
            });

            const barrioChart = new Chart(document.getElementById('barrioChart'), {
                type: 'pie',
                data: {
                    labels: @json($barrioData['labels']),
                    datasets: [{
                        data: @json($barrioData['values']),
                        backgroundColor: ['#3B82F6', '#10B981', '#F59E0B', '#EF4444', '#8B5CF6', '#EC4899', '#6B7280'],
                    }]
                }
            });

            if (ciudadChartInstance) ciudadChartInstance.destroy();
            ciudadChartInstance = new Chart(document.getElementById('ciudadChart'), {
                type: 'pie',
                data: {
                    labels: @json($ciudadData['labels']),
                    datasets: [{
                        data: @json($ciudadData['values']),
                        backgroundColor: ['#22D3EE', '#6366F1', '#F43F5E', '#10B981', '#F59E0B', '#3B82F6', '#EC4899', '#6B7280', '#F87171', '#A78BFA'],
                    }]
                }
            });

            if (sintomaChartInstance) sintomaChartInstance.destroy();
            sintomaChartInstance = new Chart(document.getElementById('sintomaChart'), {
                type: 'pie',
                data: {
                    labels: @json($sintomaData['labels']),
                    datasets: [{
                        data: @json($sintomaData['values']),
                        backgroundColor: ['#F43F5E', '#8B5CF6', '#10B981', '#F59E0B', '#3B82F6', '#EC4899', '#6B7280'],
                    }]
                }
            });

            if (enfermedadChartInstance) enfermedadChartInstance.destroy();
            enfermedadChartInstance = new Chart(document.getElementById('enfermedadChart'), {
                type: 'pie',
                data: {
                    labels: @json($enfermedadData['labels']),
                    datasets: [{
                        data: @json($enfermedadData['values']),
                        backgroundColor: ['#22D3EE', '#6366F1', '#F43F5E', '#10B981', '#F59E0B', '#3B82F6', '#6B7280'],
                    }]
                }
            });
        });
    }

    // Ejecutar en carga inicial
    document.addEventListener('DOMContentLoaded', renderCharts);

    // Re-ejecutar al terminar un update de Livewire
    document.addEventListener('livewire:load', () => {
        Livewire.hook('message.processed', () => {
            requestAnimationFrame(() => {
                setTimeout(renderCharts, 100);
            });
        });
    });
</script>
@endpush

