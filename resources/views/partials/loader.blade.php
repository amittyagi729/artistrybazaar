<!-- loader.blade.php -->
<style>
    /* Add this to your CSS file or within <style> tags */
        .loader-wrapper {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: none; /* Hide the loader by default */
        justify-content: center;
        align-items: center;
        background-color: rgba(255, 255, 255, 0.5); /* Semi-transparent background */
        z-index: 9999; /* Ensure the loader is on top of other elements */
    }
    
    .loader {
        border: 8px solid #f3f3f3; /* Light grey */
        border-top: 8px solid #3498db; /* Blue */
        border-radius: 50%;
        width: 50px;
        height: 50px;
        animation: spin 2s linear infinite;
    }
    
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    
    
    </style>
    
    <div class="loader-wrapper">
        <div class="loader"></div>
    </div>
    