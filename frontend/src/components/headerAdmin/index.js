import Logo from "../../assets/icons/WebPlayer.svg";

function HeaderAdmin(){
    return(
        <header className="bg-orange">
            <h1 className="text-center text-white">
                <img src={Logo}/>
                WebPlayer
            </h1>
        </header>
    )
}

export default HeaderAdmin;