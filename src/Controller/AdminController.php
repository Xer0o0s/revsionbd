<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use App\Form\ModfuserType;
use App\Entity\User;
use Symfony\Component\Mime\Email;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
    #[Route('/admin-listuser', name: 'list user')]
    public function luser(Request $request, EntityManagerInterface $entityManagerInterface): Response
    {
        $repoUser = $entityManagerInterface->getRepository(User::class);
        $user = $repoUser->findAll();
        return $this->render('admin/luser.html.twig', [
           'user' => $user
        
            
        ]);
    }
    #[Route('/admin-supp-user/{id}', name: 'supp-user')]
    public function suppecate(Request $request, EntityManagerInterface $entityManagerInterface): Response
    {
        $id=$request->get('id');
        $repoUser = $entityManagerInterface->getRepository(User::class);
        $user = $repoUser->find($id);
        $entityManagerInterface->remove($user);
        $entityManagerInterface->flush();
    return $this->redirectToRoute('list user');
    }
    #[Route('/admin-modif-user', name: 'modfuser')]
    public function modfuser(Request $request, EntityManagerInterface $entityManagerInterface): Response
    {
        $id=$request->get('id');
        $repoUser = $entityManagerInterface->getRepository(User::class);
        $user = $repoUser->find($id);

        $form=$this->createForm(ModfuserType::class,$user);

        if($request->isMethod('POST')){
            $form->handleRequest($request);
            if ($form->isSubmitted()&&$form->isValid()){
                $entityManagerInterface->persist($user);
                $entityManagerInterface->flush();
              
                $this->addFlash('notice','modifié');
                return $this->redirectToRoute('list user');
            }
        }
        return $this->render('admin/modfuser.html.twig', [
           'form'=> $form-> createView()
        
        
            
        ]);
    }
    #[Route('/admin-verif-user', name: 'verif-user')]
    public function verifuser(Request $request, EntityManagerInterface $entityManagerInterface): Response
    {
        
        $id=$request->get('id');
        $repoUser = $entityManagerInterface->getRepository(User::class);
        $user = $repoUser->find($id);

        $user->setIsVerified(1);
        $entityManagerInterface->persist($user);
        $entityManagerInterface->flush();
        return $this->redirectToRoute('list user');
        return $this->render('admin/luser.html.twig', [
           'user' => $user
        ]);
    }
    #[Route('/admin-devenir-admin', name: 'devenir-admin')]
    public function devadmin(Request $request, EntityManagerInterface $entityManagerInterface): Response
    {
        
        $id=$request->get('id');
        $repoUser = $entityManagerInterface->getRepository(User::class);
        $user = $repoUser->find($id);

        $user->setRoles(["ROLE_ADMIN"]);
        $entityManagerInterface->persist($user);
        $entityManagerInterface->flush();
        return $this->redirectToRoute('list user');
        return $this->render('admin/luser.html.twig', [
           'user' => $user
        ]);
    }
    #[Route('/admin-devenir-modo', name: 'devenir-modo')]
    public function devmod(Request $request, EntityManagerInterface $entityManagerInterface): Response
    {
        
        $id=$request->get('id');
        $repoUser = $entityManagerInterface->getRepository(User::class);
        $user = $repoUser->find($id);

        $user->setRoles(["ROLE_MOD"]);
        $entityManagerInterface->persist($user);
        $entityManagerInterface->flush();
        return $this->redirectToRoute('list user');
        return $this->render('admin/luser.html.twig', [
           'user' => $user
        ]);
    }
    #[Route('/admin-devenir-user', name: 'devenir-user')]
    public function devuser(Request $request, EntityManagerInterface $entityManagerInterface): Response
    {
        
        $id=$request->get('id');
        $repoUser = $entityManagerInterface->getRepository(User::class);
        $user = $repoUser->find($id);

        $user->setRoles([""]);
        $entityManagerInterface->persist($user);
        $entityManagerInterface->flush();
        return $this->redirectToRoute('list user');
        return $this->render('admin/luser.html.twig', [
           'user' => $user
        ]);
    }
}
