(()=>{
 const toggle=document.querySelector('.mobile-toggle');
 const nav=document.querySelector('.site-nav');
 function closeMenu(){if(!toggle||!nav)return;toggle.setAttribute('aria-expanded','false');nav.classList.remove('is-open');}
 toggle?.addEventListener('click',()=>{const open=toggle.getAttribute('aria-expanded')!=='true';toggle.setAttribute('aria-expanded',String(open));nav.classList.toggle('is-open',open);});
 nav?.querySelectorAll('.menu-item-has-children').forEach(item=>{
  const submenu=item.querySelector(':scope > .sub-menu');const link=item.querySelector(':scope > a');if(!submenu||!link)return;
  const button=document.createElement('button');button.type='button';button.className='submenu-toggle';button.setAttribute('aria-expanded','false');button.setAttribute('aria-label',link.textContent.trim()+' — '+(document.documentElement.lang.startsWith('el')?'υπομενού':'submenu'));button.innerHTML='<span aria-hidden="true">⌄</span>';link.after(button);
  button.addEventListener('click',()=>{const open=button.getAttribute('aria-expanded')!=='true';button.setAttribute('aria-expanded',String(open));item.classList.toggle('submenu-open',open);});
 });
 nav?.querySelectorAll('a').forEach(a=>a.addEventListener('click',closeMenu));
 document.addEventListener('click',e=>{
  document.querySelectorAll('header details[open]').forEach(d=>{if(!d.contains(e.target))d.open=false;});
  if(nav&&!nav.contains(e.target)&&!toggle?.contains(e.target)){closeMenu();nav.querySelectorAll('.submenu-open').forEach(i=>{i.classList.remove('submenu-open');i.querySelector('.submenu-toggle')?.setAttribute('aria-expanded','false');});}
 });
 document.addEventListener('keydown',e=>{if(e.key==='Escape'){closeMenu();document.querySelectorAll('header details[open]').forEach(d=>d.open=false);nav?.querySelectorAll('.submenu-open').forEach(i=>{i.classList.remove('submenu-open');i.querySelector('.submenu-toggle')?.setAttribute('aria-expanded','false');});}});
 window.matchMedia('(min-width:761px)').addEventListener('change',closeMenu);
})();
