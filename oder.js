
const menuItems = ['Pizza', 'Pasta', 'Chicken',];
const customizationOptions = {
  'Pizza': ['Margherita pizza', 'Pepperoni pizza','Veggie pizza','BBQ chicken pizza'],
  'Pasta': ['Spaghetti', 'Penne', 'Rigatoni','Fusilli'],
  'Chicken': ['Grilled chicken', 'Fried chicken','Chicken curry']
};
const quantities = [1, 2, 3, 4, 5];
const sizes = ['Small', 'Medium', 'Large'];


function populateMenuItems() {
  const selectMenu = document.getElementById('menuItems');
  menuItems.forEach(item => {
    const option = document.createElement('option');
    option.text = item;
    selectMenu.add(option);
  });
}


function populateCustomizationOptions(selectedItem) {
  const customizationDiv = document.getElementById('customizationOptions');
  customizationDiv.innerHTML = ''; 
  const options = customizationOptions[selectedItem];
  if (options) {
    options.forEach(opt => {
      const checkbox = document.createElement('input');
      checkbox.type = 'checkbox';
      checkbox.name = 'customization';
      checkbox.value = opt;

      const label = document.createElement('label');
      label.htmlFor = opt;
      label.appendChild(document.createTextNode(opt));

      customizationDiv.appendChild(checkbox);
      customizationDiv.appendChild(label);
      customizationDiv.appendChild(document.createElement('br'));
    });
  }
}

function populateQuantity() {
  const selectQuantity = document.getElementById('quantity');
  quantities.forEach(qty => {
    const option = document.createElement('option');
    option.text = qty;
    selectQuantity.add(option);
  });
}

function populateSize() {
  const selectSize = document.getElementById('size');
  sizes.forEach(size => {
    const option = document.createElement('option');
    option.text = size;
    selectSize.add(option);
  });
}


populateMenuItems();
populateQuantity();
populateSize();


document.getElementById('menuItems').addEventListener('change', function() {
  const selectedItem = this.value;
  populateCustomizationOptions(selectedItem);
});


function calculateTotalCost() {
  
    const totalPrice = 50; 
    return totalPrice;
  }
  
  
  function displayTotalCost() {
    const totalDiv = document.getElementById('totalCost');
    const totalPrice = calculateTotalCost();
    totalDiv.textContent = `Total Cost: $${totalPrice}`;
  }
  
 
  const termsText = `
    By placing this order, you agree to our terms and conditions.
    All sales are final. No refunds or exchanges.
    Thank you for choosing our service!
  `;
  
  
  function displayTermsAndConditions() {
    const termsDiv = document.getElementById('terms');
    termsDiv.textContent = termsText;
  }
  
 
  displayTotalCost();
  displayTermsAndConditions();
  