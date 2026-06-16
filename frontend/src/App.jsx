import { Routes, Route, Navigate } from "react-router-dom";

import LoginPage from "./Presentation/Pages/LoginPage";
import RegisterPage from "./Presentation/Pages/RegisterPage";
import ProtectedRoute from "./Presentation/Routes/ProtectedRoute";
import FeedPage from "./Presentation/Pages/FeedPage";

function App() {
    return (
        <Routes>
            <Route
                path="/"
                element={<Navigate to="/login" replace />}
            />

            <Route
                path="/login"
                element={<LoginPage />}
            />

            <Route
                path="/register"
                element={<RegisterPage />}
            />

            <Route
                path="/feed"
                element={
                    <ProtectedRoute>
                        <FeedPage />
                    </ProtectedRoute>
                }
            />
            
        </Routes>
    );
}

export default App;