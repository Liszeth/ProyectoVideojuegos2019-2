using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class RecogiendoObjetoController : MonoBehaviour
{
    public GameObject ObjetoRecoger;
    public GameObject ObjetoCogido;
    public Transform zonaInteraccion;
    private Animator anim;

    public bool recogiendolos = false;
    
    void Start()
    {
        anim = GetComponent<Animator>();
    }
    
    void Update()
    {
        if (recogiendolos)
        {
            if (ObjetoRecoger != null && ObjetoRecoger.GetComponent<CargarObjetoController>().isPickable == true && ObjetoCogido == null)
            {
                if (Input.GetKeyDown(KeyCode.C))
                {
                    anim.SetInteger("Estado", 5);
                    ObjetoCogido = ObjetoRecoger;
                    ObjetoCogido.GetComponent<CargarObjetoController>().isPickable = false;
                    ObjetoCogido.transform.SetParent(zonaInteraccion);
                    ObjetoCogido.transform.position = zonaInteraccion.position;
                    ObjetoCogido.GetComponent<Rigidbody2D>().useAutoMass = false;
                    ObjetoCogido.GetComponent<Rigidbody2D>().isKinematic = true;
                }
            }
            else if (ObjetoCogido != null)
            {
                if (Input.GetKeyDown(KeyCode.C))
                {
                    ObjetoCogido.GetComponent<CargarObjetoController>().isPickable = true;
                    ObjetoCogido.transform.SetParent(null);
                    ObjetoCogido.GetComponent<Rigidbody2D>().useAutoMass = true;
                    ObjetoCogido.GetComponent<Rigidbody2D>().isKinematic = true;

                    ObjetoCogido = null;
                }
            }
        }

        
    }
}
