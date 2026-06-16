import { createContext, useEffect, useState } from "react";

import LoginDTO from "../../Application/DTOs/LoginDTO.js";
import RegisterDTO from "../../Application/DTOs/RegisterDTO.js";

import LoginUseCase from "../../Application/UseCases/Auth/LoginUseCase.js";
import RegisterUseCase from "../../Application/UseCases/Auth/RegisterUseCase.js";
import LogoutUseCase from "../../Application/UseCases/Auth/LogoutUseCase.js";
import GetCurrentUserUseCase from "../../Application/UseCases/Auth/GetCurrentUserUseCase.js";

import ApiAuthRepository from "../../Infrastructure/Repositories/ApiAuthRepository.js";

export const AuthContext = createContext(null); 

const authRepository = new ApiAuthRepository();
const loginUseCase = new LoginUseCase(authRepository);
const registerUseCase = new RegisterUseCase(authRepository);
const logoutUseCase = new LogoutUseCase(authRepository);
const getCurrentUserUseCase = new GetCurrentUserUseCase(authRepository);

export const AuthProvider = ({ children }) => {

    const [user, setUser] = useState(null);
    const [loading, setLoading] = useState(true);

    const [token, setToken] = useState(
        localStorage.getItem("token")
    );

    const login = async (email, password) => {

        const dto = new LoginDTO(email, password);
        const response = await loginUseCase.execute(dto);

        localStorage.setItem(
            "token",
            response.token
        );

        setToken(response.token);
        setUser(response.user);
        return response;
    };

    const register = async (firstName, lastName, email, password) => {

        const dto = new RegisterDTO(
            firstName,
            lastName,
            email,
            password
        );

        return await registerUseCase.execute(dto);
    };

    const logout = async () => {
        try {
            await logoutUseCase.execute();
        } finally {
            localStorage.removeItem("token");
            setToken(null);
            setUser(null);
        }
    };

    const loadCurrentUser = async () => {

        const savedToken = localStorage.getItem("token");

        if (!savedToken) {
            setLoading(false);
            return;
        }

        try {
            const response = await getCurrentUserUseCase.execute();
            setUser(response.user);
        } catch (error) { 
            localStorage.removeItem("token");
            setToken(null);
            setUser(null);
        } finally {
            setLoading(false);
        }
    };

    useEffect(() => {
        loadCurrentUser();
    }, []);

    return (
        <AuthContext.Provider
            value={{
                user,
                token,
                loading,
                login,
                register,
                logout,
                loadCurrentUser,
                isAuthenticated: !!token,
            }}
        >
            {children}
        </AuthContext.Provider>
    );
};