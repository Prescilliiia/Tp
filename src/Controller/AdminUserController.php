<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/user')]
class AdminUserController extends AbstractController
{
    #[Route('/', name: 'app_admin_User_index', methods: ['GET'])]
    public function index(UserRepository $UserRepository): Response
    {
        return $this->render('admin_user/index.html.twig', [
            'users' => $UserRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_User_new', methods: ['GET', 'POST'])]
    public function new(Request $request, UserRepository $UserRepository): Response
    {
        $User = new User();
        $form = $this->createForm(UserType::class, $User);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $UserRepository->save($User, true);

            return $this->redirectToRoute('app_admin_User_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_User/new.html.twig', [
            'user' => $User,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_User_show', methods: ['GET'])]
    public function show(User $User): Response
    {
        return $this->render('admin_User/show.html.twig', [
            'user' => $User,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_User_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, User $User, UserRepository $UserRepository): Response
    {
        $form = $this->createForm(UserType::class, $User);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $UserRepository->save($User, true);

            return $this->redirectToRoute('app_admin_User_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_User/edit.html.twig', [
            'user' => $User,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_User_delete', methods: ['POST'])]
    public function delete(Request $request, User $User, UserRepository $userRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $User->getId(), $request->request->get('_token'))) {
            $userRepository->remove($User, true);
        }

        return $this->redirectToRoute('app_admin_User_index', [], Response::HTTP_SEE_OTHER);
    }
}
