import { BrowserRouter, Routes, Route } from "react-router-dom";
import Admin from "./page/Admin";
import Home from "./page/Home";
import Error from "./page/Error";

function RoutesApp(){
    return(
        <BrowserRouter>
            <Routes>
                <Route path="/" element={<Home/>} />
                <Route path="/admin" element={<Admin/>} />
                
                <Route path="*" element={<Error/>}/>
            </Routes>
        </BrowserRouter>
    )
}

export default RoutesApp;