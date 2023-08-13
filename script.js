document.addEventListener('DOMContentLoaded', function() {

    // Add JavaScript functionality to the Paste button
document.getElementById('pasteButton').addEventListener('click', function() {
    navigator.clipboard.readText().then(function(pastedText) {
        document.getElementById('inputText').value = pastedText;
    });
});

// Add JavaScript functionality to the Clear button
document.getElementById('clearButton').addEventListener('click', function() {
    document.getElementById('inputText').value = '';
});

// Add JavaScript functionality to the Copy button
document.getElementById('copyButton').addEventListener('click', function() {
    var inputText = document.getElementById('inputText');
    inputText.select();
    document.execCommand('copy');
});

// Add JavaScript functionality to the Save button
document.getElementById('saveButton').addEventListener('click', function() {
    alert('Text saved!');
});

//converting text area value to upper case
document.getElementById('uppercase').addEventListener('click', function(){
    let uperrCase = textArea.value.toUpperCase()
    textArea.value = uperrCase
})

//converting text area value to lower case
document.getElementById('lowercase').addEventListener('click', function(){
    let lowerCase = textArea.value.toLowerCase()
    textArea.value = lowerCase
})

//Countering Word Count
document.getElementById('clearButton').addEventListener('click', counter)
let textArea = document.getElementById('inputText')
textArea.addEventListener('input', counter)

function counter(){
        let word = document.querySelectorAll('.word');
        let char = document.querySelectorAll('.char');
        let reading = document.querySelector('.reading')
        let speaking = document.querySelector('.speaking')
        let paragraph = document.querySelector('.para')
        let sentence = document.querySelector('.sentence')
        char.forEach(item =>{
            item.innerHTML = textArea.value.split(' ').filter((element) =>{return element.length!=0}).length
        })
        word.forEach(item =>{
            item.innerHTML = textArea.value.length
        })
        reading.innerHTML = 0.008 *  textArea.value.split(' ').filter((element) =>{return element.length!=0}).length
        speaking.innerHTML = 0.00714285714 *  textArea.value.split(' ').filter((element) =>{return element.length!=0}).length.toFixed(2)
        paragraph.innerHTML = textArea.value.split(/\n+/).filter((element) =>{return element.length!=0}).length
        sentence.innerHTML = textArea.value.split(/[.!?]+/).filter((element) =>{return element.length!=0}).length
}
});


