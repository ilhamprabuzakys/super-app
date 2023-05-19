import './bootstrap';

const form = document.getElementById('message-form');
const inputMessage = document.getElementById('input-message');
const listMessage = document.getElementById('list-messages');
const otherUser = document.getElementById('otherUser');
otherUser.textContent = "Empty";
let currentUser = null;
const isTyping = document.getElementById('isTyping');
form.addEventListener('submit', function(e) {
   e.preventDefault();
   console.log(window.currentUser.name);
   const userInput = inputMessage.value;
   axios.post('/chat-message', {
      message: userInput
   });
   inputMessage.value = '';
});

function addChatMessage(name, message) {
   const li = document.createElement('li');
   const divConversationList = document.createElement('div');
   divConversationList.classList.add('conversation-list');
   const divDflex = document.createElement('div');
   divDflex.classList.add('d-flex');
   const divFlex1 = document.createElement('div');
   divFlex1.classList.add('flex-1');
   const divctext = document.createElement('div');
   divctext.classList.add('ctext-wrap');
   const divctextcontent = document.createElement('div');
   divctextcontent.classList.add('ctext-wrap-content');
   const pUser = document.createElement('p');
   pUser.classList.add('mb-1', 'fw-bold');
   pUser.textContent = name;
   const pMessage = document.createElement('p');
   pMessage.classList.add('mb-0');
   pMessage.textContent = message;
   divctextcontent.append(pUser, pMessage);
   divctext.append(divctextcontent);
   divFlex1.append(divctext);
   divDflex.append(divFlex1);
   divConversationList.append(divDflex);
   li.append(divConversationList);
   if (window.currentUser.name == name) {
      li.classList.add('right');
   } else {
      otherUser.textContent = name;
   }

   listMessage.append(li);
}


let usersOnline = [];

const channel = Echo.join('presence.chat.1');
inputMessage.addEventListener('input', function(e) {
   console.log(e.data);
   if(inputMessage.value.length === 0) {
      channel.whisper('stop-typing');
   } else {
   channel.whisper('typing', {
      email: email
   });
}
});
channel.here((users) => {
   usersOnline = [...users];
   console.log({users});
   console.log('subscribbed!');
})
.joining((user) => {
   console.log({user}, 'joined the channel');
   addChatMessage(user.name, " has joined the room!");
   if (window.currentUser && window.currentUser.name !== user.name) {
      otherUser.textContent = user.name;
   }
})
.leaving((user) => {
   console.log({user}, 'leaving the channel');
   addChatMessage(user.name, " has leaving the room!");
})
.listen('.chat-message', (e) => {
   console.log(e);
   const message = e.message;
   addChatMessage(e.user.name, message);
})
.listenForWhisper('typing', (e) => {
   isTyping.textContent = e.email + " is typing...";
})
.listenForWhisper('stop-typing', (e) => {
   isTyping.textContent ="";
})

function joinRoom(name,) {
   // Perform any necessary operations when the user joins the room
   // For example, displaying a message "You've joined the room"
   addChatMessage('You', "You've joined the room!");

   // Update the otherUser element if there are other users in the room
   if (usersOnline.length > 0) {
      const otherUserName = usersOnline[0].name; // Assuming the first user in the list
      otherUser.textContent = otherUserName;
   }
}

// joinRoom();

// function updatePost()
// {
//    const socket = new WebSocket(`ws://${window.location.hostname}:6001/socket/update-post`);
//    socket.onopen = function() {
//       console.log('on open');
//    }
// }