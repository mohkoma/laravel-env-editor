/**
 * Vars
 */
var isLoading = true;
var envContent = null;
var accessKey = null;
var editor = null;

/**
 * Render the editor
 */
function renderEditor(value) {
    // Set the editor
    editor = ace.edit("editor");
    editor.setValue(value);
    editor.setTheme("ace/theme/monokai");
    editor.session.setMode("ace/mode/sh");
    editor.renderer.setScrollMargin(20, 20, 0, 0);
    editor.renderer.setPadding(15);
    editor.navigateFileEnd();
    envContent = value;
}

/**
 * Destroy the editor
 */
function destroyEditor() {
    if(!editor) return;
    editor.destroy();
}

/**
 * Render the editor
 */
function fetchEnv() {
    // Mark as loading
    showSpinner();
    // Call server
    setTimeout(() => {
        axios.get('/dev/environment/fetch')
        .then((response) => {
            if(!response.data.env) return;
            renderEditor(response.data.env);
        }).finally((response) => {
            hideSpinner();
        });
    }, 1500);
}

/**
 * Show spinner
 */
function showSpinner() {
    // Mark as loading
    isLoading = true;
    // Get the element
    let spinner = document.getElementById("spinner");
    // Show element
    spinner.style.display = 'flex';
    // Hide the editor
    let editor = document.getElementById("editor");
    editor.style.display = 'none';
}

/**
 * Hide spinner
 */
function hideSpinner() {
    // Mark as ended
    isLoading = false;
    // Get the element
    let spinner = document.getElementById("spinner");
    // Show element
    spinner.style.display = 'none';
    // Hide the editor
    let editor = document.getElementById("editor");
    editor.style.display = 'block';
}

/**
 * Reload the editor
 */
function reload() {
    fetchEnv();
}

/**
 * Save the editor
 */
function save() {
    // Mark as loading
    showSpinner();
    // Clear error
    clearError();
    // Call server
    setTimeout(() => {
        axios.post('/dev/environment/save', { env: editor.getValue() })
        .then((response) => {
            if(!response.data.env) return;
            location.reload();
        }).catch((error) => {
            if(error.response.status == 419) {
                location.reload();
            }
            showError(error.response.data.message);
            hideSpinner();
        })
        .finally((response) => {
           //
        });
    }, 1500);
}

/**
 * Show error
 */
function showError(error) {
    // Get the element
    let element = document.getElementById("error");
    element.style.display = "flex";
    let message = document.getElementById("error-message");
    message.innerHTML = error;
}

/**
 * Hide error
 */
function clearError() {
    // Get the element
    let element = document.getElementById("error");
    element.style.display = "none";
    let message = document.getElementById("error-message");
    message.innerHTML = "";
}

/**
 * Fetch
 */
fetchEnv();
