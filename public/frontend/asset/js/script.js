const sliderItem = document.querySelectorAll('.slider-item')
for(let index = 0; index <sliderItem.length; index++){
    sliderItem[index].style.left = index * 100 + "%"
}

const sliderItems = document.querySelector('.slider-items')
const arrowRight = document.querySelector('.ri-arrow-right-s-line')
const arrowLeft = document.querySelector('.ri-arrow-left-s-line')
let i = 0
if(arrowRight != null && arrowLeft != null){
    arrowRight.addEventListener('click',()=>{

        if(i < sliderItem.length-1){
            i++
            sliderMove(i)
        }else{
            return false
        }
    })  
    arrowLeft.addEventListener('click',()=>{
        if(i <= 0){
            return false
        }else{
            i--
            sliderMove(i)
        }
    })
    function autoSlider(){
        if(i< sliderItem.length -1){
            i++
            sliderMove(i)
            console.log(i)
        }else{
            i=0
            sliderMove(i)
        }
    }
}

function sliderMove(i){
    sliderItems.style.left = -i*100 + "%"
}
setInterval(autoSlider,5000)

//Menubar responsive
const Menubar = document.querySelector('.header-bar-icon')
const headerNav = document.querySelector('.header-nav')
Menubar.addEventListener('click',()=>{
    headerNav.classList.toggle('active')
})

//Click product image detail
const imageSmall = document.querySelectorAll('.product-images-items img')
const imageMain = document.querySelector('.main-image')
for(let index = 0; index < imageSmall.length; index++){
    imageSmall[index].addEventListener('click',()=>{
        imageMain.src = imageSmall[index].src
        for(let i = 0; i< imageSmall.length; i++){
            imageSmall[i].classList.remove('active')
        }
            imageSmall[index].classList.add('active')
    })
}

//Quantity product
const quantityMinus = document.querySelectorAll('.ri-checkbox-indeterminate-fill')
const quantityPlus = document.querySelectorAll('.ri-add-box-fill')
const quantityInput = document.querySelectorAll('.quantity-input')

if(quantityMinus!= null && quantityPlus!= null)
{

    for (let index = 0; index < quantityPlus.length; index++) {

        quantityPlus[index].addEventListener('click',()=>{
            inputValue = quantityInput[index].value
                inputValue++
                quantityInput[index].value = inputValue
                console.log(quantityInput[index].value)
        })
        quantityMinus[index].addEventListener('click',()=>{
            inputValue = quantityInput[index].value
            if(inputValue <= 1){
                return false
            }else{
                inputValue--
                quantityInput[index].value = inputValue
            }
        })
    }
}

