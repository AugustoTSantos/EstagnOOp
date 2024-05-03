// Importa o componente AuthenticatedLayout do diretório '@/Layouts/AuthenticatedLayout'.
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
// Importa o componente Head do pacote @inertiajs/react.
import { Head } from '@inertiajs/react';

// Declara o componente Dashboard como uma função que recebe props, incluindo informações de autenticação.
export default function Dashboard({ auth }) {
    return (
        // Renderiza o componente AuthenticatedLayout, que define o layout da página autenticada e recebe o usuário autenticado como prop.
        <AuthenticatedLayout
            user={auth.user} // Passa o usuário autenticado como prop para o componente AuthenticatedLayout.
            // Define o cabeçalho da página como um elemento h2 com o texto "Dashboard".
            header={<h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Dashboard</h2>}
        >
            {/* Define as tags de cabeçalho HTML para a página, com o título "Dashboard". */}
            <Head title="Dashboard" />

            {/* Renderiza o conteúdo principal da página. */}
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900 dark:text-gray-100">You're logged in!</div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
