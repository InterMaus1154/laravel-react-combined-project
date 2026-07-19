import { Link } from '@tanstack/react-router';

const NavBar = () => {
    return (
        <nav className="p-4 flex gap-4 items-center">
            <Link to={'/'}>Home</Link>
            <Link to={'/todos'}>Todos</Link>
        </nav>
    );
};

export default NavBar;
