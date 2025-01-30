

function populateCartWithSubscriptionPlan(cartContent) {
    if (cartContent) {
        // Extract subscription plan details
        var planName = cartContent.subscriptionName;
        var price = cartContent.Price;
        console.log(planName + " " + price);
        // Add the subscription plan to the cart
        addItemToCart(planName, price);
    } else {
        // Handle case where subscription plan is not available
        console.error('Subscription plan information not found.');
    }
}



function populateSubscriptionList() {
    var subscriptionList = $('#subscriptionList'); 
    
    $.ajax({
        url: 'fetch_subscription_list.php', 
        type: 'GET',
        dataType: 'json', 
        success: function(response) {
            $.each(response, function(index, plan) {
                // Create a new list item for each subscription plan
                var listItem = $('<a>', {
                    href: '#',
                    class: 'list-group-item list-group-item-action',
                    text: plan.subscriptionName + ' - ₱ ' + plan.Price.toLocaleString('en-US', {maximumFractionDigits: 2})
                });
                
                // Add click event listener to the list item
                listItem.on('click', function() {
                    addItemToCart(plan.subscriptionName, parseFloat(plan.Price));
                });
                
                // Append the list item to the subscription list
                subscriptionList.append(listItem);
            });
        },
        error: function(xhr, status, error) {
            // Handle errors
            console.error('Error fetching subscription plans:', error);
        }
    });
}

function addItemToCart(itemName, itemPrice) {
    var cart = document.getElementById('cart');
    var totalElement = document.getElementById('total');
    var total = parseFloat(totalElement.innerText);
    
    // Clear the existing cart content
    cart.innerHTML = '';

    // Update the total
    total = itemPrice;
    totalElement.innerText = total.toFixed(2);

    // Create a new list item for the added item
    var li = document.createElement('li');
    li.className = 'list-group-item';
    li.innerHTML = `
        <strong>Plan:</strong> ${itemName} - ₱ ${itemPrice.toFixed(2)}
        <button class="btn btn-danger btn-sm float-end" onclick="removeItem(this)"><i class="fa-solid fa-minus"></i></button>`;
    cart.appendChild(li);
}


function removeItem(button) {
    var listItem = button.parentElement;
    var itemPriceText = listItem.innerText.split('-')[1].trim().split('₱')[1];
    var itemPrice = parseFloat(itemPriceText);
    var totalElement = document.getElementById('total');
    var total = parseFloat(totalElement.innerText);
    total -= itemPrice;
    totalElement.innerText = total.toFixed(2);
    listItem.remove();
}

function calculateChange() {
    var cashAmount = parseFloat(document.getElementById('cashAmount').value);
    var total = parseFloat(document.getElementById('total').innerText);
    var changeAmount = cashAmount - total;
    document.getElementById('changeAmount').value = changeAmount.toFixed(2);
}

function generateTransactionId() {
    return Math.floor(Math.random() * 1000000); // Generates a random 6-digit number
}

window.onload = function() {
    populateSubscriptionList();
    populateCartWithSubscriptionPlan(cartContent);
};



function saveTransaction(user_id,transactionNo, walkinid, walkinname) {
    var cashAmount = $("#cashAmount").val();
    var changeAmount = $("#changeAmount").val();
    var cartItems = document.getElementById('cart').getElementsByTagName('li');
    var subscriptionName = "";
    var subscriptionPrice = 0.0;
    if (cartItems.length > 0) {
        var itemText = cartItems[0].innerText;
        subscriptionName = itemText.split(' - ')[0].split(':')[1].trim();
        subscriptionPrice = parseFloat(itemText.split(' - ')[1].trim().split('₱')[1]);
    }

    Swal.fire({
        title: 'Confirm Transaction',
        text: `Are you sure you complete the transaction?`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: `Yes`
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({
                type: "POST",
                url: "update_transaction.php",
                data: {
                    user_id: user_id,
                    transactionNo: transactionNo,
                    cashAmount: cashAmount,
                    changeAmount: changeAmount,
                    subscriptionName: subscriptionName,
                    subscriptionPrice: subscriptionPrice,
                    walkinid: walkinid,
                    walkinname: walkinname
                },
                success: function(response) {
                    console.log(response);
                    if (response == "Success") {
                        Swal.fire({
                            icon: "success",
                            title: "Success",
                            text: "Transaction Complete",
                            showConfirmButton: true,
                        }).then(function() {
                            window.location.href = "view_invoice.php?id=" + transactionNo;
                        });
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Result",
                            text: response,
                            showConfirmButton: true,
                        }).then(function() {});
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error saving transaction:', error);
                }
            });
            
        }
    });

    
}
