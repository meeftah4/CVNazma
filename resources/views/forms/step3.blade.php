{{-- filepath: d:\Magang\CVNazma\resources\views\forms\step3.blade.php --}}
{{-- Stepper --}}
    <div class="text-center mb-4">
        <h4 class="fw-bold mb-3">Template</h4>
        <div class="d-flex justify-content-center align-items-center gap-2 mb-2">
            <div class="step-circle active"><i class="bi bi-person"></i></div>
            <div class="step-line"></div>
            <div class="step-circle active"><i class="bi bi-file-earmark-text"></i></div>
            <div class="step-line"></div>
            <div class="step-circle active"><i class="bi bi-file-earmark"></i></div>
        </div>
    </div>

    {{-- Template Grid --}}
    <div class="row justify-content-center g-4 mb-4">
        <div class="col-md-2">
            <div class="template-card selected">
                <img src="{{ asset('img/template1.png') }}" class="img-fluid" alt="Template 1">
            </div>
        </div>
        <div class="col-md-2">
            <div class="template-card pro">
                <img src="{{ asset('img/template2.png') }}" class="img-fluid" alt="Template 2">
                <span class="badge-pro">Pro</span>
            </div>
        </div>
        <div class="col-md-2">
            <div class="template-card pro">
                <img src="{{ asset('img/template3.png') }}" class="img-fluid" alt="Template 3">
                <span class="badge-pro">Pro</span>
            </div>
        </div>
        <div class="col-md-2">
            <div class="template-card pro">
                <img src="{{ asset('img/template4.png') }}" class="img-fluid" alt="Template 4">
                <span class="badge-pro">Pro</span>
            </div>
        </div>
        <div class="col-md-2">
            <div class="template-card coming-soon">
                <img src="{{ asset('img/template5.png') }}" class="img-fluid" alt="Coming Soon">
                <span class="coming-soon-text">Coming Soon</span>
            </div>
        </div>
    </div>

    {{-- Button --}}
    <div class="text-center">
        <button class="btn btn-warning px-5 fw-bold">Unlock CV</button>
    </div>


{{-- Custom CSS --}}
<style>
    .step-circle {
        width: 40px; height: 40px;
        border-radius: 50%;
        background: #002366;
        color: #fff;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.5rem;
    }
    .step-line {
        width: 60px; height: 6px;
        background: #002366;
        border-radius: 3px;
    }
    .template-card {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        padding: 10px;
        position: relative;
        transition: border 0.2s;
        border: 2px solid transparent;
        min-height: 220px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .template-card.selected {
        border: 2px solid #002366;
    }
    .template-card.pro {
        opacity: 0.7;
    }
    .badge-pro {
        position: absolute;
        top: 10px; left: 10px;
        background: #002366;
        color: #fff;
        padding: 4px 12px;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: bold;
    }
    .template-card.coming-soon {
        opacity: 0.5;
        background: #e9f0ff;
    }
    .coming-soon-text {
        position: absolute;
        top: 40%; left: 50%;
        transform: translate(-50%, -50%);
        color: #002366;
        font-size: 1.2rem;
        font-weight: bold;
    }
</style>
@endsection