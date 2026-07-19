import { Link } from '@tanstack/react-router';
import { logout } from '../api/auth';

const NavBar = () => {
    const handleLogout = async () => {
        await logout();
        window.location.href = '/';
    };

    return (
        <nav className="p-4 flex gap-4 items-center">
            <Link to={'/'}>Home</Link>
            <Link to={'/todos'}>Todos</Link>
            <button
                onClick={handleLogout}
                className="px-4 py-2 bg-purple-400 text-white font-bold hover:bg-purple-300 cursor-pointer rounded-sm"
            >
                Logout
            </button>
        </nav>
    );
};

export default NavBar;
