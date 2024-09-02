const accountsSelectList = document.querySelector("#cuenta-origen");
const formNewTransfer = document.querySelector("#newTransfer");
const accountToTransferInput = document.querySelector("#cuenta-destino");
const accountClientNameInput = document.querySelector("#nombre-destinatario");

newTransfer();
getAccounts();

accountToTransferInput.addEventListener("keyup", function() {
    verifyAccount();
})

function newTransfer() {

    formNewTransfer.onsubmit = async (e) => {
        e.preventDefault();

        let url = 'http://localhost/eBanking/app/controllers/AccountController.php?function=create';

        let response = await fetch(url);

        const result = await response.json();

        alert(result.message);
    }

}

async function getAccounts() {

    let url = 'http://localhost/eBanking/app/controllers/AccountController.php?function=getAccounts';

    let response = await fetch(url);

    const result = await response.json();

    const accountList = result.data;

    accountList.forEach(account => {
        // Crear una nueva opción
        var accountOption = document.createElement('option');
        accountOption.value = account.account_id; // Valor que se enviará cuando se seleccione esta opción
        accountOption.textContent = `${account.account_id} -  $ ${account.balance}`; // Texto que se mostrará en el menú desplegable

        // Agregar la nueva opción al elemento <select>
        accountsSelectList.appendChild(accountOption);
    });

}


async function verifyAccount(){
    let url = 'http://localhost/eBanking/app/controllers/AccountController.php?function=verifyAccount';

    let formTransferData = new FormData();
    formTransferData.append("account_id", accountToTransferInput.value)

    let config = {
        method: 'POST',
        body: formTransferData
    };
    
    let response = await fetch(url, config);

    const result = await response.json();

    const data = result.data;

    if(data != null){
        accountClientNameInput.value = data.full_name;
    }



}