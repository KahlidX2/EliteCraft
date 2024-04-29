const startButton = document.getElementById('start-btn');
const nextButton = document.getElementById('next-btn');
const questionContainerElement = document.getElementById('question-container');
const questionElement = document.getElementById('question');
const answerButtonsElement = document.getElementById('answer-buttons');

let ShuQuestion, nowQuestion;
startButton.addEventListener('click', startGame);//when he click call the function startGame
nextButton.addEventListener('click', () => {
    nowQuestion++;
    setNextQuestion();
});



function startGame() {
   
    // add 'hide' class to startbutton
    startButton.classList.add('hide');
    // sort questions randomly
    ShuQuestion = questions.sort(() => Math.random() -.5);
    // initialize current question index
    nowQuestion = 0;
    // remov 'hide' class from questionContainerElement
    questionContainerElement.classList.remove('hide');
    // set next question
    setNextQuestion();
}


function setNextQuestion(){
    resetState();
    showQuestion(ShuQuestion[nowQuestion]);
}

function showQuestion(question) {
    // displai the question text
    questionElement.innerHTML = question.question;
    // loop through each answer
    question.answers.forEach(answer => {
        // crete a button element for each answer
        const button = document.createElement('button');
        // set the button text to the answer text
        button.innerText = answer.text;
        // add 'btn' class to the button for styling
        button.classList.add('btn');
        // if the answer is correct, set the dataset attribute
        if (answer.correct) {
            button.dataset.correct = answer.correct;
        }
        // add click event listener to the button
        button.addEventListener('click', SlectAnswer);
        // append the button to the answer buttons container
        answerButtonsElement.appendChild(button);
    });
    // crete an image element
    const image = document.createElement('img');
    // set the image source to the question's image
    image.src = question.image;
    // set image display and margin properties
    image.style.display = "block";
    image.style.margin = "20px auto";
    // append the image to the question container
    questionElement.appendChild(image);
}


function resetState(){
    clearStatusClass(document.body)
    nextButton.classList.add('hide');
    while(answerButtonsElement.firstChild){
        answerButtonsElement.removeChild(answerButtonsElement.firstChild);
    }
}
function SlectAnswer(e){
    const selectedButton = e.target;
    const correct = selectedButton.dataset.correct;
    setState(document.body, correct);
    Array.from(answerButtonsElement.children).forEach(button => {
        setState(button, button.dataset.correct);
    });

    // check if there are more questions
    if(ShuQuestion.length > nowQuestion + 1){
        // if there are, show the next button
        nextButton.classList.remove('hide');
    } else{
        // if not, change start button text to Restart
        startButton.innerText = 'Restart';
        startButton.classList.remove('hide');
    }
}

// set the state of the element based on correctness
function setState(element, correct){
    clearStatusClass(element);
    // if correct, add 'correct' class; otherwise, add 'wrong' class
    if (correct){
        element.classList.add('correct');
    }else{
        element.classList.add('wrong');
    }
}

// this function clears the status class after each question
function clearStatusClass(element){
    // remove both 'correct' and 'wrong' classes
    element.classList.remove('correct');
    element.classList.remove('wrong');
}

//This are the questions list
const questions = [
    {
        question: 'The Great Wall of China is so long that it can be seen from space. How long is it approximately?',
        image:'TheGreatWall.jpg',
        answers:[
          { text: '5,000 miles', correct: false },
          { text: ' 8,000 miles', correct: false },
          { text: '10,000 miles', correct: true },
          { text: ' 13,000 miles', correct: false }
        ]
    },
    {
        question: 'The Burj Khalifa, the tallest building in the world, has how many elevators?',
        image:'Burj.jpg',
        answers: [
          { text: '57', correct: false },
          { text: '76', correct: false },
          { text: '98', correct: false },
          { text: '124', correct: true }
        ]
      },
      {
        question: 'The Eiffel Tower in Paris was built as part of:',
        image:'Eiffle.jpg',
        answers: [
          { text: 'A celebration for the end of World War one', correct: false },
          { text: ' A transportation project', correct: false },
          { text: ' A contest to design a monument', correct: true },
          { text: 'A religious pilgrimage site', correct: false }
        ]
      },
      {
        question: 'The Golden Gate Bridge spans across which body of water?',
        image:'Gate.jpg',
        answers: [
            { text: ' San Francisco Bay', correct: true },
            { text: ' Hudson River', correct: false },
            { text: ' Mississippi River', correct: false },
            { text: 'Puget Sound', correct: false }
        ]
      },
      {
        question: 'The Colosseum in Rome could seat approximately how many people?',
        image:'Colosseum.jpg',
        answers: [
            { text: ' 20,000', correct: false },
            { text: ' 40,000', correct: true },
            { text: ' 60,000', correct: false },
            { text: ' 80,000', correct: false }
        ]
      },
      {
        question: 'The Pyramids of Giza were built as:',
        image:'pyramids.jpg',
        answers: [
            { text: ' Temples for worship', correct: false },
            { text: ' Tombs for pharaohs', correct: true },
            { text: ' Fortresses to protect against invaders', correct: false },
            { text: ' Observatories for astronomers', correct: false }
        ]
      },
      {
        question: 'The Empire State Building was once the tallest building in the world. How many years did it hold that title for?',
        image:'EmpireState.jpg',
        answers: [
            { text: ' 15 years', correct: false },
            { text: ' 25 years', correct: false },
            { text: ' 40 years', correct: false },
            { text: ' 50 years', correct: true }
        ]
      },
      {
        question: 'The Leaning Tower of Pisa in Italy leans due to:',
        image:'LeaningTower.jpg',
        answers: [
            { text: ' An earthquake', correct: false },
            { text: ' Poor construction foundation', correct: true },
            { text: ' Strong winds', correct: false },
            { text: ' A deliberate design choice', correct: false }
        ]
      },
      {
        question: 'The Statue of Liberty in New York was a gift from which country?',
        image:'StatueOfLiberty .jpg',
        answers: [
            { text: ' France', correct: true },
            { text: ' United Kingdom', correct: false },
            { text: ' Italy', correct: false },
            { text: ' Spain', correct: false }
        ]
      },
      {
        question: 'Elite Craft is the best ',
        image:'logo.png',
        answers: [
            { text: ' No', correct: false },
            { text: ' Yes', correct: true }
        ]
      }
];