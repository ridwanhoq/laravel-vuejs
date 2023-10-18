
vue js 
- [ ] basic
  - [ ] method
  - [ ] directive
  - [ ] conditional rendering
  - [ ] arguments
  - [ ] lifecycle
  
- [ ] vue cli using node js 
  - [ ] animation
  - [ ] database

- [ ] advance
  - [ ] route
  - [ ] vuex
  - [ ] authentication

- [ ] vs code
  - [ ] extensions ( check on episode 2 )
    - [ ] vueter **
    - [ ] vue 2 snippet
    - [ ] vue pic
    - [ ] vue.js extension pack 
    - [ ] emmet
  
- [ ] start 
  - [ ] el 
    - [ ] select the element define with . or # for class or id
  - [ ] data 
  - [ ] methods property
    - [ ] this keyword
    - [ ] directives
      - [ ] built in 
        - [ ] basic - to use attribute of tag in vue js then directive must be used
          - [ ] v-bind is directive to bind a tag attribute  with vue js
            - [ ] no need to use {{ }} when using data in v-bind 
              - [ ] example: <img v-bind:src='imageSrc'>  imageSrc is a property of vue js
          - [ ] v-text is directive to show any text
            - [ ] example: <p v-text="myText"></p>
          - [ ] v-html is directive to show html in a tag
            - [ ] <p v-html="myHtml"></p>
        - [ ] conditional rendering
          - [ ] v-if is used to apply condition 
            - [ ] you can call method in v-if directive 
          - [ ] v-show is used to show data conditional
            - [ ] shown in dom but not displayed on page but v-if does not find in inspect also
        - [ ] looping in vue js
          - [ ] v-for is used to loop an array 
            - [ ] always use {{ }} still after the tag is used v-for, no element should be placed after v-for
              - [ ] array
                - [ ] example :  <li v-for="(car, index) in cars"> @{{ index + 1 }} : @{{ car }} </li>
              - [ ] object
                - [ ] <li v-for="(user, key, index) in users"> @{{ index + 1 }} : @{{ key }} : @{{ user }} </li>
        - [ ] v-once is used to to render only once, no need to update if updated by any method of vue js 
          - [ ] example: 
        - [ ] events
          - [ ] v-on:click is used to fire on click event 
            - [ ] click is the most common 
          - [ ] v-on:mousemove is used to fire on mouse over
            - [ ] example: event.clientX 
          - [ ] method with argument
          - [ ] modifier
            - [ ] v-on:click.right, (left, right, once)
          - [ ] event.preventDefault
            - [ ] <form v-on:submit="handleForm"></form>
        - [ ] v-model
          - [ ] two way binding
            - [ ]  v-model="formData.firstName" 
    - [ ] computed property
      - [ ] when clicking on a button, then all methods are rendered, to avoid this need to use computed property
        - [ ] never use parentheses while calling methods defined in computed property
        - [ ] when need to change, update or calculate then use computed property
          - [ ] computed: { addToA(){} }
    - [ ] short hands
      - [ ] shortcut for event
        - [ ] v-on:click changed to @click
        - [ ] v-on:change changed to @change
      - [ ] shortcut for binding html attribute
        - [ ] v-bind changed to :
      - [ ] no shorthand for v-model
    - [ ] multiple instances
      - [ ] pass from one instance to another
      - [ ] on click change
    - [ ] mounted property
      - [ ] to change the value after a certain time 
    - [ ] template property
      - [ ] 
    - [ ] custom
    - [ ] 




